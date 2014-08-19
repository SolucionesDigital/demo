<?php

namespace Soluciones\Controllers;

use Illuminate\Support\Facades\Redirect;
use Soluciones\Exceptions\InvalidPrintRequest;
use Soluciones\Exceptions\UnredeemableBenefitException;
use Soluciones\Repositories\BenefitsRepository;
use Soluciones\Repositories\CategoriesRepository;
use Auth, Input, PDF, View;

class BenefitsController extends BaseController {

	/**
	 * @var \Soluciones\Repositories\BenefitsRepository
	 */
	private $benefitsRepository;

	/**
	 * @var \Soluciones\Repositories\CategoriesRepository
	 */
	private $categoriesRepository;

	/**
	 * @param BenefitsRepository   $benefitsRepository
	 * @param CategoriesRepository $categoriesRepository
	 */
	function __construct(BenefitsRepository $benefitsRepository, CategoriesRepository $categoriesRepository)
	{
		$this->benefitsRepository   = $benefitsRepository;
		$this->categoriesRepository = $categoriesRepository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /benefit
	 *
	 * @return Response
	 */
	public function index($slug = null)
	{
		$benefits = $this->benefitsRepository->getPaginated();

		return $this->view('benefits.index', [
			'benefits'   => $benefits,
			'categories' => $this->categoriesRepository->getAll()
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /benefit
	 *
	 * @return Response
	 */
	public function store()
	{
		if ( ! $benefitId = Input::get('benefit_id') ) return Redirect::back();

		$this->benefitsRepository->attachToCurrentUser($benefitId);

		return Redirect::back()->with('benefit-created', 'Se guardo el beneficio');
	}

	/**
	 * @param $benefitId
	 *
	 * @throws InvalidPrintRequest
	 * @return mixed
	 */
	public function printBenefit($benefitId)
	{
		if ( ! $this->benefitsRepository->currentUserHasBenefit($benefitId) ) throw new InvalidPrintRequest;

		$userData = Auth::user()->benefits()->having('benefit_id','=',$benefitId)->first();

		$html = View::make('pdf.beneficio', [
			'benefit'      => $this->benefitsRepository->getById($benefitId),
			'redeem_token' => array_get($userData->toArray(), 'pivot.redeem_token'),
		]);

		return PDF::load($html)->show();
	}

	/**
	 * @param $benefitId
	 *
	 * @throws InvalidPrintRequest
	 * @return mixed
	 */
	public function downloadBenefit($benefitId)
	{
		if ( ! $this->benefitsRepository->currentUserHasBenefit($benefitId) ) throw new InvalidPrintRequest;

		$userData = Auth::user()->benefits()->having('benefit_id','=',$benefitId)->first();

		$html = View::make('pdf.beneficio', [
			'benefit'      => $this->benefitsRepository->getById($benefitId),
			'redeem_token' => array_get($userData->toArray(), 'pivot.redeem_token'),
		]);

		return PDF::load($html)->download();
	}

	/**
	 * @param $benefitId
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Soluciones\Exceptions\UnredeemableBenefitException
	 *
	 * @todo Refactor this fucking mess.
	 */
	public function redeemBenefit($benefitId)
	{
		if ( ! $redeemToken = Input::get('redeem_token') ) throw new UnredeemableBenefitException;

		$isRedeemed = $this->benefitsRepository->redeemBenefit($benefitId, $redeemToken);

		if ( $isRedeemed )
		{
			return View::make('pdf.response')->withErrors(['error' => 'El cupon NO es valido']);
		}

		return View::make('pdf.response');
	}

}

<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\CarService;
use Sang\CarForRent\Service\UploadFileService;
use Sang\CarForRent\Transformer\CarTransformer;
use Sang\CarForRent\Validation\CarValidation;
use Sang\CarForRent\Validation\ImageValidation;

class CarController extends BaseController
{
    const TARGET_DIR = 'img/';
    private CarValidation $carValidation;
    private CarService $carService;
    private ImageValidation $imgValidation;
    private UploadFileService $uploadFileService;
    private CarTransformer $carTransformer;

    public function __construct(Request           $request,
                                Response          $response,
                                CarValidation     $carValidation,
                                CarService        $carService,
                                ImageValidation   $imgValidation,
                                UploadFileService $uploadFileService,
                                CarTransformer    $carTransformer,
    )
    {
        parent::__construct($request, $response);
        $this->carValidation = $carValidation;
        $this->carService = $carService;
        $this->imgValidation = $imgValidation;
        $this->uploadFileService = $uploadFileService;
        $this->carTransformer = $carTransformer;
    }

    public function addCar(): Response
    {
        if ($this->request->isPost()) {

            $params = $this->request->getFormParams();
            $carImg = $this->request->getFiles()['img'];
            $params = array_merge($params, ["img" => $carImg['name']]);

            $this->carValidation->loadData($params);
            if (!$this->carValidation->validate()) {
                return $this->response->view('addCarForm', ['errors' => $this->carValidation]);
            }
            $validate = $this->imgValidation->validate($carImg, 210000, $params);
            if ($validate) {
                return $this->response->view('addCarForm', ['imgerrors' => $validate]);
            }

            $result = $this->uploadFileService->upLoadFile($carImg);

            if (isset($result['error'])) {
                return $this->response->view('addCarForm', ['imgerrors' => $result]);
            } else {
                $params = array_merge($params, ["img" => $result]);

                $this->carTransformer->toObject($params);
                $this->carService->createCar($this->carTransformer);
            }

            return $this->response->view('home');
        }

        return $this->response->view('addCarForm', ['errors' => $this->carValidation]);
    }

    public function index()
    {
        $carList = $this->carService->listCar();
        $countCar = $this->carService->countCar();
        return $this->response->view('home', ['list' => $carList,
            'count' => $countCar
        ]);
    }
}

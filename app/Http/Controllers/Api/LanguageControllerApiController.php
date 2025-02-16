<?php

namespace App\Http\Controllers\Api;

  use App\Http\Controllers\Controller;
  use App\Services\LanguageService;
  use App\Http\Requests\Language\StoreRequest;
  use App\Http\Requests\Language\UpdateRequest;

  class LanguageControllerApiController extends Controller
  {
      protected $languageService;

      public function __construct(LanguageService $languageService)
      {
          $this->languageService = $languageService;
      }

      public function index()
      {
          $languages = $this->languageService->getAll();
          return response()->json($languages);
      }

      public function store(StoreRequest $request)
      {
          $language = $this->languageService->store($request->validated());
          return response()->json($language, 201);
      }

      public function show($id)
      {
          $language = $this->languageService->find($id);
          return response()->json($language);
      }

      public function update(UpdateRequest $request, $id)
      {
          $language = $this->languageService->update($id, $request->validated());
          return response()->json($language);
      }

      public function destroy($id)
      {
          $this->languageService->destroy($id);
          return response()->json(null, 204);
      }
  }

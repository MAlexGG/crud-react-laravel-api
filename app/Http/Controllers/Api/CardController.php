<?php

namespace App\Http\Controllers\Api;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Requests\SaveCardRequest;
use App\Http\Requests\UpdateCardRequest;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CardResource::collection(Card::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCardRequest $request)
    {
        return (new CardResource(Card::create($request->all())))->additional(['msg' => 'Card saved correctly']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return new CardResource($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $card->update($request->all());

        return (new CardResource($card))->additional(['msg' => 'Card updated correctly']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return (new CardResource($card))->additional(['msg' => 'Card deleted correctly']);
    }
}

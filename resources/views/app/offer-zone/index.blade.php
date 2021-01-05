@extends('app.layouts.app')

@section('scripts')
    <script src="{{ asset('js/app/offer-zone/index.js') }}" defer></script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <h2>Zona de Ofertas</h2>
    </div>
    <div class="row justify-content-center font-weight-bold">
        <p>Comparte esta oferta con tus amigos</p>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form id="share_offer">
                        <div class="form-group row justify-content-center">
                            <label for="your_name" class="col-sm-2">Tu nombre:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="your_name" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="friend_name" class="col-sm-2">El nombre de tu amigo:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="friend_name" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="friend_email" class="col-sm-2">El correo de tu amigo:</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="friend_email" maxlength="60">
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button type="button" id="btn_share_offer" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
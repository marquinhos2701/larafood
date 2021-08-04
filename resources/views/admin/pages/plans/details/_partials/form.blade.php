@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label><b>Nome:</b></label>
    <input type="text" name="name" class="form-control" placeholder="Nome do Detalhe:" value="{{ $detail->name ?? old('name') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
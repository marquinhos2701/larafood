@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label><b>* Nome:</b></label>
    <input type="text" name="name" class="form-control" placeholder="Nome do Plano:" value="{{ $profile->name ?? old('name') }}">
</div>
<div class="form-group">
    <label><b>Descrição:</b></label>
    <input type="text" name="description" class="form-control" placeholder="Descrição do Perfil:" value="{{ $profile->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
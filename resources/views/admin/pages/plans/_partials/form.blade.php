@include('admin.includes.alerts')

<div class="form-group">
    <label><b>Nome:</b></label>
    <input type="text" name="name" class="form-control" placeholder="Nome do Plano:" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label><b>Preço:</b></label>
    <input type="text" name="price" class="form-control" placeholder="Preço do Plano:" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <label><b>Descrição:</b></label>
    <input type="text" name="description" class="form-control" placeholder="Descrição do Plano:" value="{{ $plan->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
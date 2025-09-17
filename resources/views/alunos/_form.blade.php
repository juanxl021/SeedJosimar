@csrf

<div class="mb-3">
    <label for="numero_caixa" class="form-label">Número da Caixa</label>
    <input type="text" name="numero_caixa" id="numero_caixa" class="form-control @error('numero_caixa') is-invalid @enderror" value="{{ old('numero_caixa', isset($aluno) ? $aluno->numero_caixa : '') }}" required maxlength="50">
    @error('numero_caixa')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="numero_pasta" class="form-label">Número da Pasta</label>
    <input type="text" name="numero_pasta" id="numero_pasta" class="form-control @error('numero_pasta') is-invalid @enderror" value="{{ old('numero_pasta', isset($aluno) ? $aluno->numero_pasta : '') }}" required maxlength="50">
    @error('numero_pasta')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nome_aluno" class="form-label">Nome do Aluno</label>
    <input type="text" name="nome_aluno" id="nome_aluno" class="form-control @error('nome_aluno') is-invalid @enderror" value="{{ old('nome_aluno', isset($aluno) ? $aluno->nome_aluno : '') }}" required maxlength="100">
    @error('nome_aluno')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nome_responsavel" class="form-label">Nome do Responsável</label>
    <input type="text" name="nome_responsavel" id="nome_responsavel" class="form-control @error('nome_responsavel') is-invalid @enderror" value="{{ old('nome_responsavel', isset($aluno) ? $aluno->nome_responsavel : '') }}" required maxlength="100">
    @error('nome_responsavel')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control @error('data_nascimento') is-invalid @enderror" value="{{ old('data_nascimento', isset($aluno) ? \Carbon\Carbon::parse($aluno->data_nascimento)->format('Y-m-d') : '') }}" required>
    @error('data_nascimento')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="turma_id" class="form-label">Turma</label>
    <select name="turma_id" id="turma_id" class="form-control @error('turma_id') is-invalid @enderror">
        <option value="">-- Selecione uma Turma --</option>
        @foreach($turmas as $turma)
            <option value="{{ $turma->id }}" {{ old('turma_id', isset($aluno) ? $aluno->turma_id : '') == $turma->id ? 'selected' : '' }}>
                {{ $turma->nome }}
            </option>
        @endforeach
    </select>
    @error('turma_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="obs" class="form-label">Observações</label>
    <textarea name="obs" id="obs" class="form-control @error('obs') is-invalid @enderror" rows="3">{{ old('obs', isset($aluno) ? $aluno->obs : '') }}</textarea>
    @error('obs')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ isset($aluno) ? 'Atualizar' : 'Salvar' }}</button>
<a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>

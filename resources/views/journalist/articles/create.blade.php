@extends('layouts.app')

@section('content')
<div style="background:#f1f3f6; padding:40px 16px; min-height:100vh;">
    <div style="max-width:700px; margin:0 auto;">

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <h1 style="color:#1a237e; font-size:1.4rem; font-weight:700; margin:0;">Criar Nova Matéria</h1>
            <a href="{{ route('articles.index') }}" style="color:#555; text-decoration:none; font-size:0.875rem;">Voltar</a>
        </div>

        <div style="background:#fff; border-radius:16px; padding:36px; border:0.5px solid #e0e0e0;">

            @if($errors->any())
            <div style="background:#fff0f0; border-left:4px solid #e53935; border-radius:8px; padding:14px 18px; margin-bottom:24px;">
                <ul style="margin:0; padding-left:18px; color:#c62828; font-size:0.875rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#333; margin-bottom:8px;">Título <span style="color:#e53935;">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Título da matéria"
                        style="width:100%; padding:13px 16px; border:1.5px solid #e0e0e0; border-radius:10px; font-size:0.95rem; box-sizing:border-box; outline:none; color:#333;"
                        onfocus="this.style.borderColor='#1a237e'" onblur="this.style.borderColor='#e0e0e0'">
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#333; margin-bottom:8px;">Subtítulo</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="Subtítulo da matéria"
                        style="width:100%; padding:13px 16px; border:1.5px solid #e0e0e0; border-radius:10px; font-size:0.95rem; box-sizing:border-box; outline:none; color:#333;"
                        onfocus="this.style.borderColor='#1a237e'" onblur="this.style.borderColor='#e0e0e0'">
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#333; margin-bottom:8px;">Conteúdo <span style="color:#e53935;">*</span></label>
                    <textarea name="body" placeholder="Conteúdo da matéria" rows="6"
                        style="width:100%; padding:13px 16px; border:1.5px solid #e0e0e0; border-radius:10px; font-size:0.95rem; box-sizing:border-box; outline:none; resize:vertical; line-height:1.6; color:#333;"
                        onfocus="this.style.borderColor='#1a237e'" onblur="this.style.borderColor='#e0e0e0'">{{ old('body') }}</textarea>
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:#333; margin-bottom:8px;">Imagem <span style="color:#e53935;">*</span></label>
                    <div style="display:flex; align-items:center; gap:16px;">
                        <label for="image-input" style="background:#1a237e; color:#fff; padding:10px 20px; border-radius:8px; font-size:0.875rem; font-weight:600; cursor:pointer; white-space:nowrap;">Escolher arquivo</label>
                        <span style="font-size:0.875rem; color:#888;" id="file-label">Nenhum arquivo escolhido</span>
                        <input id="image-input" type="file" name="image" accept="image/*" style="display:none;"
                            onchange="document.getElementById('file-label').textContent = this.files[0]?.name || 'Nenhum arquivo escolhido'">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:28px;">
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#333; margin-bottom:8px;">Categoria</label>
                        <select name="category_id" style="width:100%; padding:13px 16px; border:1.5px solid #e0e0e0; border-radius:10px; font-size:0.95rem; box-sizing:border-box; outline:none; background:#fff; color:#333;">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:#333; margin-bottom:8px;">Status</label>
                        <select name="status" style="width:100%; padding:13px 16px; border:1.5px solid #e0e0e0; border-radius:10px; font-size:0.95rem; box-sizing:border-box; outline:none; background:#fff; color:#333;">
                            <option value="draft" {{ old('status','draft') == 'draft' ? 'selected' : '' }}>Rascunho</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publicado</option>
                        </select>
                    </div>
                </div>

                <div style="display:flex; justify-content:flex-end; gap:16px; align-items:center;">
                    <a href="{{ route('articles.index') }}" style="color:#888; text-decoration:none; font-size:0.875rem;">Cancelar</a>
                    <button type="submit"
                        style="background:#1a237e; color:#fff; border:none; padding:12px 32px; border-radius:50px; font-size:0.95rem; font-weight:600; cursor:pointer;">
                        Salvar Matéria
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
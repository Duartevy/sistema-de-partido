@section('scripts')
<script>
    const estadoSelect = document.getElementById('estado');
    const cidadeSelect = document.getElementById('cidade');

    async function carregarEstados() {
        const response = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome');
        const estados = await response.json();

        estados.forEach(estado => {
            const option = document.createElement('option');
            option.value = estado.sigla;
            option.text = estado.nome;
            estadoSelect.appendChild(option);
        });
    }

    async function carregarCidades(siglaEstado) {
        cidadeSelect.innerHTML = '<option value="">Carregando...</option>';

        const response = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${siglaEstado}/municipios`);
        const cidades = await response.json();

        cidadeSelect.innerHTML = '<option value="">Selecione a cidade</option>';
        cidades.forEach(cidade => {
            const option = document.createElement('option');
            option.value = cidade.nome;
            option.text = cidade.nome;
            cidadeSelect.appendChild(option);
        });
    }

    estadoSelect.addEventListener('change', () => {
        const estado = estadoSelect.value;
        if (estado) carregarCidades(estado);
    });

    window.onload = carregarEstados;
</script>
@endsection

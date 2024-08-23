
document.addEventListener('DOMContentLoaded', function() {

    const radioPJ = document.getElementById("RadioPj")
    const radioPF = document.getElementById("RadioPf")

    const formPJ = document.getElementById("PJ")
    const formPF = document.getElementById("PF") 

    radioPJ.addEventListener('change', function(){

        if(radioPJ.checked){
            formPJ.style.display = 'block';
            formPF.style.display = 'none';
        }

    });

    radioPF.addEventListener('change', function() {
        if (radioPF.checked) {
            
            formPF.style.display = 'block';
            formPJ.style.display = 'none';
        }
    });

})

document.addEventListener('DOMContentLoaded', function() {

    const radioPJ = document.getElementById("RadioPf1")
    const radioPF = document.getElementById("RadioPf1")

    const formPJ = document.getElementById("PJ")
    const formPF = document.getElementById("PF") 

    radioPJ.addEventListener('change', function(){

        if(radioPJ.checked){
            formPJ.style.display = 'block';
            formPF.style.display = 'none';
        }

    });

    radioPF.addEventListener('change', function() {
        if (radioPF.checked) {
            
            formPF.style.display = 'block';
            formPJ.style.display = 'none';
        }
    });

})


// async function qverificaCNPJAPI() {

//     const cnpj = document.getElementById('cnpj_entidade').value;

//     if (cnpj.length === 14) { // Verifica se o CNPJ tem 14 dígitos
//         try {
//             const response = await fetch(`https://publica.cnpj.ws/cnpj/${cnpj}`, {
//                 method: 'GET',
//                 headers: {
//                     'Accept': 'application/json',
//                     'Content-Type': 'application/json'
//                 }
//             });

//             if (response.ok) {
//                 const empresa = await response.json();
                
//                 // Atualiza os campos do formulário com os dados da empresa
//                 document.getElementById('nome_empresa_entidade').value = empresa.nome || '';
//                 document.getElementById('logradouro').value = empresa.logradouro || '';
//                 document.getElementById('numero').value = empresa.numero || '';

//             } else {

//                 console.error("Erro na solicitação:", response.status, response.statusText);

//             }
//         } catch (error) {
//             console.error("Erro ao buscar o CNPJ:", error);
//         }
//     } else {
//         alert('Por favor, insira um CNPJ válido com 14 dígitos.');
//     }
// }

function verificaCNPJAPI() {
    
    const cnpj = document.getElementById('cnpj_entidade').value;
    const API = "https://publica.cnpj.ws/cnpj/";
    var contato = null;

    fetch(API+cnpj)
        .then(response => {
            // console.log(response)
            return response.json();
        }).then(dados => {

            console.log('Dados', dados);

            if(dados.length != 0){

                // junta o ddd mais o numero do contato
                contato = dados.estabelecimento.ddd1 + dados.estabelecimento.telefone1

                document.getElementById('nome_empresa_entidade').value = dados.razao_social
                document.getElementById('contato_entidade').value = contato
                document.getElementById('logradouro_entidade').value = dados.estabelecimento.logradouro
                document.getElementById('numero_entidade').value = dados.estabelecimento.numero
                document.getElementById('bairro_entidade').value = dados.estabelecimento.bairro
                document.getElementById('cidade_entidade').value = dados.estabelecimento.cidade.nome
                document.getElementById('uf_entidade').value = dados.estabelecimento.estado.sigla
                document.getElementById('cep_entidade').value = dados.estabelecimento.cep
                document.getElementById('email_entidade').value = dados.estabelecimento.email
            }
        })
} 


function verificarCampoCNPJ(){

    const cnpj = document.getElementById('cnpj_entidade').value;

    var btn_submit_pj = document.getElementById('btn_submit_pj');
    var cnpj_entidade = document.getElementById('cnpj_entidade');
    var nome_empresa_entidade = document.getElementById('nome_empresa_entidade');
    var mensagemOff = document.getElementById('mensagemOff');


    if (cnpj.length != 14) {

        btn_submit_pj.disabled = true;
        cnpj_entidade.classList.add('border-danger');
        mensagemOff.textContent = "Digite correto o CNPJ!"
        mensagemOff.classList.add('text-danger');

        document.getElementById('nome_empresa_entidade').disabled = true
        document.getElementById('contato_entidade').disabled = true
        document.getElementById('logradouro_entidade').disabled = true
        document.getElementById('numero_entidade').disabled = true
        document.getElementById('bairro_entidade').disabled = true
        document.getElementById('cidade_entidade').disabled = true
        document.getElementById('uf_entidade').disabled = true
        document.getElementById('cep_entidade').disabled = true
        document.getElementById('email_entidade').disabled = true

    } else {

        btn_submit_pj.disabled = false;
        cnpj_entidade.classList.remove('border-danger');
        mensagemOff.textContent = "CNPJ Aceito"
        mensagemOff.classList.add('text-success');
        
        document.getElementById('nome_empresa_entidade').disabled = false
        document.getElementById('contato_entidade').disabled = false
        document.getElementById('logradouro_entidade').disabled = false
        document.getElementById('numero_entidade').disabled = false
        document.getElementById('bairro_entidade').disabled = false
        document.getElementById('cidade_entidade').disabled = false
        document.getElementById('uf_entidade').disabled = false
        document.getElementById('cep_entidade').disabled = false
        document.getElementById('email_entidade').disabled = false  
    }

}

function buscaCliente(){

    const identificador = document.getElementById("identificador").value.replace(/\.|\/|-/g, '').trim();
    // const entidade = document.getElementById('entidade').value;
    const msgErro = document.getElementById('msgErro');
    const msgCliente = document.getElementById('msgCliente');

    // dados para cliente pf
    const cpf_cliente_pf = document.getElementById('cpf_cliente_pf');
    const nome_cliente_pf = document.getElementById('nome_cliente_pf');
    const email_cliente_pf = document.getElementById('email_cliente_pf');
    const contato_cliente_pf = document.getElementById('contato_cliente_pf');
    const entidade_cliente_pf = document.getElementById('entidade_cliente_pf');
    const id_usuario_cliente_pf = document.getElementById('id_usuario_cliente_pf');
    const id_cliente_pf = document.getElementById('id_cliente_pf');

    // dados para cliente pj
    const bairro_cliente_pj = document.getElementById('bairro_cliente_pj');
    const cep_cliente_pj = document.getElementById('cep_cliente_pj');
    const cidade_cliente_pj = document.getElementById('cidade_cliente_pj');
    const cnpj_cliente_pj = document.getElementById('cnpj_cliente_pj');
    const contato_cliente_pj = document.getElementById('contato_cliente_pj');
    const email_cliente_pj = document.getElementById('email_cliente_pj');
    const entidade_cliente_pj = document.getElementById('entidade_cliente_pj');
    const id_cliente_pj = document.getElementById('id_cliente_pj');
    const id_usuario_cliente_pj = document.getElementById('id_usuario_cliente_pj');
    const logradouro_cliente_pj = document.getElementById('logradouro_cliente_pj');
    const nome_cliente_pj = document.getElementById('nome_cliente_pj');
    const numero_cliente_pj = document.getElementById('numero_cliente_pj');
    const responsavel_cliente_pj = document.getElementById('responsavel_cliente_pj');
    const telefone_cliente_pj = document.getElementById('telefone_cliente_pj');
    const uf_cliente_pj = document.getElementById('uf_cliente_pj');


    var pj = document.getElementById('PJ');
    var pf = document.getElementById('PF');


    fetch('../entidade/provedoresEntidade/BuscaCliente.php?identificador='+identificador)
        .then(response => {
            console.log('Response', response)
            return response.json()
        })
        .then(dados => {
             console.log('Dados', dados);

             if(dados.identificador == 'PF') {

                cpf_cliente_pf.value = dados.cpf_cliente_pf;
                nome_cliente_pf.value = dados.nome_cliente_pf;
                email_cliente_pf.value = dados.email_cliente_pf;
                contato_cliente_pf.value = dados.contato_cliente_pf;
                entidade_cliente_pf.value = dados.entidade_cliente_pf;
                id_usuario_cliente_pf.value = dados.id_usuario_cliente_pf;
                id_cliente_pf.value = dados.id_cliente_pf;

                msgCliente.style.display = 'none'

             } else if(dados.identificador == 'PJ') {

                bairro_cliente_pj.value = dados.bairro_cliente_pj
                cep_cliente_pj.value = dados.cep_cliente_pj
                cidade_cliente_pj.value = dados.cidade_cliente_pj
                cnpj_cliente_pj.value = dados.cnpj_cliente_pj
                contato_cliente_pj.value = dados.email_cliente_pj
                email_cliente_pj.value = dados.email_cliente_pj
                entidade_cliente_pj.value = dados.entidade_cliente_pj
                id_cliente_pj.value = dados.id_cliente_pj
                id_usuario_cliente_pj.value = dados.id_usuario_cliente_pj
                logradouro_cliente_pj.value = dados.logradouro_cliente_pj                
                nome_cliente_pj.value = dados.nome_cliente_pj
                numero_cliente_pj.value = dados.numero_cliente_pj
                responsavel_cliente_pj.value = dados.responsavel_cliente_pj
                telefone_cliente_pj.value = dados.telefone_cliente_pj
                uf_cliente_pj.value = dados.uf_cliente_pj

                msgCliente.style.display = 'none'

             } else if(dados.error == 'VAZIO') {

                if(identificador.length == 11) {

                    msgCliente.style.display = 'block'
                    pf.style.display = 'block'
                } else {

                    msgCliente.style.display = 'block'
                    pj.style.display = 'block' 
                    
                }
             } else {

                msgErro.textContent = 'Digite o CPF ou CNPJ Corretamente'
                msgErro.classList.add('text-danger')

             }
        })
        .catch(error => {
            console.log(error)
        })

        if(identificador.length == 11){

            pf.style.display = 'block';
            pj.style.display = 'none';
            msgErro.classList.remove('text-danger')
            msgErro.textContent = "Cliente Pessoa Física";
            msgErro.classList.add('text-success')


        } else {

           pj.style.display = 'block'; 
           pf.style.display = 'none';
           msgErro.classList.remove('text-danger')
           msgErro.textContent = "Cliente Pessoa Jurídica";
           msgErro.classList.add('text-success')
        } 
    
}  

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        locale: 'pt-br',
        navLinks: true,
        selectable: true,
        selectMirror: true,
        editable: true,
        dayMaxEvents: true,
        events: 'provedoresEntidade/ChamaVendasPespectivas.php',
        eventClick: function(info) {
            // Preencher os detalhes do evento no modal
            document.getElementById('modalItem').textContent = info.event.title;
            document.getElementById('modalCliente').textContent = info.event.extendedProps.cliente; // Acessa o cliente nos extendedProps
            document.getElementById('modalTelefone').textContent = info.event.extendedProps.telefone;
            document.getElementById('ultimaVenda').textContent = info.event.extendedProps.ultimaVenda;
            document.getElementById('modalDataVenda').textContent = info.event.start.toISOString().split('T')[0];
            document.getElementById('modalPreco').textContent = info.event.extendedProps.preco; // Acessa o preço nos extendedProps

            // Exibir o modal
            var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
            eventModal.show();
        }
    });

    calendar.render();
});

function historicoVendas(){

    const id_usuario = document.getElementById('id_usuario').value;
    const id_entidade = document.getElementById('id_entidade').value;
    const dataIncial = document.getElementById('dataInicial').value;
    const dataFinal = document.getElementById('dataFinal').value;
    const hist = document.getElementById('hist-vendas')
    const conteudoErro = document.getElementById('conteudoErro')
    const conteudo = document.getElementById('conteudo')
    
   

    const API = "provedoresEntidade/ChamaHistoricoVendas.php?id_usuario="+id_usuario+"&&id_entidade="+id_entidade+"&&dataIncial="+dataIncial+"&&dataFinal="+dataFinal;

    fetch(API)
    .then(response => {

        console.log('Response', response)
        return response.json()
    }).then(Dados => {

        console.log('Dados', Dados)
        hist.style.display = 'block';

        if(Dados.error == "VAZIO"){

            conteudoErro.style.display = 'block'
            conteudo.style.display = 'none'

        } else {

            conteudo.style.display = 'block'
            conteudoErro.style.display = 'none'
           

            Dados.forEach(dado => {
                const vendaDiv = document.createElement('div');
                vendaDiv.innerHTML = `        
                <h5>Cliente: ${dado.nome_cliente_venda}</h5>
                <strong>Item: </strong>${dado.item_produto_venda}<br>
                <strong>Data: </strong>${dado.data_venda}<br>
                <strong>Código de Venda: </strong>${dado.codigo_venda}<br>
                <strong>Preço de Venda: </strong>${dado.preco_vendido_venda}<br>
                <strong><hr></strong>
                `;

                conteudo.appendChild(vendaDiv);
            });

           
        }
        
    }).catch(error => {
        console.log(error)
    })
}

function ExportaExcel() {

    const id_usuario = document.getElementById('id_usuario').value;
    const id_entidade = document.getElementById('id_entidade').value;
    const dataIncial = document.getElementById('dataInicial').value;
    const dataFinal = document.getElementById('dataFinal').value; 

    const API = "provedoresEntidade/ExportaExcel.php?id_usuario="+id_usuario+"&&id_entidade="+id_entidade+"&&dataIncial="+dataIncial+"&&dataFinal="+dataFinal;

    fetch(API);

    const link = document.createElement('a');
    link.href = API;
    link.download = 'historico_venda.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);

}
function MovimentacaoFinanceira(){

    const id_usuario = document.getElementById('id_usuario').value;
    const id_entidade = document.getElementById('id_entidade').value;
    const dataIncial = document.getElementById('dataInicial').value;
    const dataFinal = document.getElementById('dataFinal').value;
    const movimentacao = document.getElementById('movimentacao')
    const movimentacaoSucesso = document.getElementById('movimentacaoSucesso')
    const movimentacaoVazia = document.getElementById('movimentacaoVazia')
    const custo = document.getElementById('custo')
    const desconto = document.getElementById('desconto')
    const venda = document.getElementById('venda')
    const lucro = document.getElementById('lucro')
    const movimentacaoMonetaria = document.getElementById('movimentacaoMonetaria')

    const API = "provedoresEntidade/MovimentacaoFinanceira.php?id_usuario="+id_usuario+"&&id_entidade="+id_entidade+"&&dataIncial="+dataIncial+"&&dataFinal="+dataFinal;

    fetch(API)
        .then(response => {

            console.log('Response', response)
            return response.json()
            
        }).then(Dados => {

            console.log('Dados', Dados)

            if(Array.isArray(Dados) && Dados.length > 0){

                movimentacao.style.display = 'block';
                movimentacaoSucesso.style.display = 'block'
                movimentacaoVazia.style.display = 'none'

                // Limpar o conteúdo anterior
                movimentacaoSucesso.innerHTML = '';
                
                Dados.forEach(Dado => {
                    const movimentacaoMensal = document.createElement('div')
                    movimentacaoMensal.innerHTML = `
                    <p><strong>Código: </strong>#${Dado.codigo_venda} | <strong>Cliente: </strong>${Dado.nome_cliente_venda} | <strong>Item: </strong>${Dado.item_produto_venda} | <strong>Preço Custo: </strong>${parseFloat(Dado.preco_custo_venda).toFixed(2)} | <strong>Desconto: </strong>${parseFloat(Dado.desconto_venda).toFixed(2)} | <strong>Preço Venda: </strong>${parseFloat(Dado.preco_vendido_venda).toFixed(2)}</p>  
                    <hr>`;
                    movimentacaoSucesso.appendChild(movimentacaoMensal);
                })

                const totais = Dados[0];
                custo.textContent = parseFloat(totais.total_preco_custo).toFixed(2);
                desconto.textContent = parseFloat(totais.total_desconto_venda).toFixed(2);
                venda.textContent = parseFloat(totais.total_preco_vendido_venda).toFixed(2);
                let Soma = parseFloat(totais.total_preco_vendido_venda).toFixed(2) - parseFloat(totais.total_desconto_venda).toFixed(2) - parseFloat(totais.total_preco_custo).toFixed(2)
                lucro.textContent = parseFloat(Soma).toFixed(2)
                movimentacaoMonetaria.style.display = 'block'

            } else if(Dados.error == 'VAZIO'){
                movimentacao.style.display = 'block';
                movimentacaoSucesso.style.display = 'none'
                movimentacaoVazia.style.display = 'block'
                movimentacaoMonetaria.style.display = 'none'
            }

        }).catch(error => {

            console.log('erro', error)
        })

}



    






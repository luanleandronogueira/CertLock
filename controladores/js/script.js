
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


async function verificaCNPJAPI() {

    const cnpj = document.getElementById('cnpj_entidade').value;

    if (cnpj.length === 14) { // Verifica se o CNPJ tem 14 dígitos
        try {
            const response = await fetch(`https://www.receitaws.com.br/v1/cnpj/${cnpj}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const empresa = await response.json();
                
                // Atualiza os campos do formulário com os dados da empresa
                document.getElementById('nome_empresa_entidade').value = empresa.nome || '';
                document.getElementById('logradouro').value = empresa.logradouro || '';
                document.getElementById('numero').value = empresa.numero || '';

            } else {

                console.error("Erro na solicitação:", response.status, response.statusText);

            }
        } catch (error) {
            console.error("Erro ao buscar o CNPJ:", error);
        }
    } else {
        alert('Por favor, insira um CNPJ válido com 14 dígitos.');
    }
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

    const identificador = document.getElementById("identificador").value;
    const msgErro = document.getElementById('msgErro');

    // dados para cliente pf
    const cpf_cliente_pf = document.getElementById('cpf_cliente_pf');
    const nome_cliente_pf = document.getElementById('nome_cliente_pf');
    const email_cliente_pf = document.getElementById('email_cliente_pf');
    const contato_cliente_pf = document.getElementById('contato_cliente_pf');
    const entidade_cliente_pf = null;
    const id_cliente_pf = null;

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


    






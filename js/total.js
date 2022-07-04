var $input_quantidade = document.querySelector("#qtd"); /*Entrando com quantidade*/ 
var $output_total = document.querySelector("#total"); /*Saindo com total*/

$input_quantidade.oninput = function(){
    var preco = document.querySelector("#preco").textContent; /*Recebe preço texto*/
    /*Transformando  texto em float*/
    preco = preco.replace("R$ ", "");
    preco = preco.replace(",", ".");
    preco = parseFloat(preco);

    var quantidade = $input_quantidade.value; /*Recebe quantidade */
    var total = quantidade*preco; /*Calculo total */
    /*Transforma float em texto */
    total = "R$ " + total.toFixed(2);
    total = total.replace(".", ",");

    $output_total.value = total; /*Saída total */
}

/*mascara cpf*/
$(document).ready(function(){
    var $campoCpf = document.querySelector("#cpf");
    $campoCpf.mask('000.000.000-00', {reverse: true});
})
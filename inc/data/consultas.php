<?php
date_default_timezone_set("America/Sao_Paulo");
//error_reporting(0);

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($mes)) {
    $mes = date("m");
}
if (!isset($ano)) {
    $ano = date("Y");
}
if (!isset($parametro)) {
    $parametro = array("","","","","","","","","","");
}

// FINANCEIRO ///////////////

define("LISTAR_VALORES_ANO_DETALHES", "select 
 id,descricao,tipo,
 (select round(sum(valor),2) from tarefas where mes ='01' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '1',
 (select round(sum(valor),2) from tarefas where mes ='02' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '2',
 (select round(sum(valor),2) from tarefas where mes ='03' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '3',
 (select round(sum(valor),2) from tarefas where mes ='04' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '4', 
 (select round(sum(valor),2) from tarefas where mes ='05' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '5',
 (select round(sum(valor),2) from tarefas where mes ='06' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '6',
 (select round(sum(valor),2) from tarefas where mes ='07' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '7',
 (select round(sum(valor),2) from tarefas where mes ='08' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '8',
 (select round(sum(valor),2) from tarefas where mes ='09' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '9' ,
 (select round(sum(valor),2) from tarefas where mes ='10' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '10',
 (select round(sum(valor),2) from tarefas where mes ='11' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '11',
 (select round(sum(valor),2) from tarefas where mes ='12' and tipo =T.id and   ano = '".$parametro[0]."' and usuario='".$_SESSION["id_usuario"]."') as '12'
 from tipo as T
 where  usuario='".$_SESSION["id_usuario"]."' 
 group by T.id
 order by T.tipo desc,T.descricao");

define("TOTAL_RECEITA_DESPESA", "select 
'Receita',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 01 group by tip.tipo) as '01',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 02 group by tip.tipo) as '02',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 03 group by tip.tipo) as '03',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 04 group by tip.tipo) as '04',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 05 group by tip.tipo) as '05',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 06 group by tip.tipo) as '06',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 07 group by tip.tipo) as '07',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 08 group by tip.tipo) as '08',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 09 group by tip.tipo) as '09',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 10 group by tip.tipo) as '10',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 11 group by tip.tipo) as '11',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 1 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 12 group by tip.tipo) as '12'
union
select 'Despesa',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 01 group by tip.tipo) as '01',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 02 group by tip.tipo) as '02',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 03 group by tip.tipo) as '03',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 04 group by tip.tipo) as '04',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 05 group by tip.tipo) as '05',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 06 group by tip.tipo) as '06',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 07 group by tip.tipo) as '07',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 08 group by tip.tipo) as '08',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 09 group by tip.tipo) as '09',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 10 group by tip.tipo) as '10',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 11 group by tip.tipo) as '11',
(select round(sum(valor),2) from tarefas tar inner join tipo tip where tar.tipo = tip.id and tip.tipo = 0 and usuario='".$_SESSION["id_usuario"]."' and tar.ano = '".$parametro[0]."' and tar.mes = 12 group by tip.tipo) as '12'");


define("RELATORIO_RECEITA_DESPESA_INVESTIMENTO", "
  select tar.ano, tar.mes, 
  round(coalesce(sum(case when tip.tipo = 1 then tar.valor else 0 end), 0), 2) as receita,
  round(coalesce(sum(case when tip.tipo = 0 then tar.valor else 0 end), 0), 2) as despesa,
  round(coalesce(sum(tar.valor), 0), 2) as saldo
  round(coalesce(sum(case when tip.tipo = 2 then tar.valor else 0 end), 0), 2) as investimento,
  round(coalesce(sum(case when tip.tipo = 0 then tar.valor else 0 end - case when tip.tipo = 2 then tar.valor else 0 end), 0), 2) as resultado
  from tarefas tar, tipo tip
  where tar.tipo = tip.id 
  and tar.usuario = '".$_SESSION["id_usuario"]."'
  group by tar.ano, tar.mes");

define("RESUMO_RECEITA_DESPESA_INVESTIMENTO_POR_MES", "
  select 'Receita' as agrupador, round(coalesce(sum(case when tip.tipo = 1 then tar.valor else 0 end), 0), 2) as valor
  from tarefas tar, tipo tip
  where tar.tipo = tip.id 
  and tar.ano = '".$parametro[0]."'
  and tar.mes = '".$parametro[1]."'
  and tar.usuario = '".$_SESSION["id_usuario"]."'
  union
  select 'Despesa', round(coalesce(sum(case when tip.tipo = 0 then tar.valor else 0 end), 0), 2)
  from tarefas tar, tipo tip
  where tar.tipo = tip.id 
  and tar.ano = '".$parametro[0]."'
  and tar.mes = '".$parametro[1]."'
  and tar.usuario = '".$_SESSION["id_usuario"]."'
  union
  select 'Saldo', round(coalesce(sum(tar.valor), 0), 2)
  from tarefas tar, tipo tip
  where tar.tipo = tip.id 
  and tar.ano = '".$parametro[0]."'
  and tar.mes = '".$parametro[1]."'
  and tar.usuario = '".$_SESSION["id_usuario"]."'
  union
  select 'Investimento', round(coalesce(sum(case when tip.id = 23 then tar.valor else 0 end), 0), 2)
  from tarefas tar, tipo tip
  where tar.tipo = tip.id 
  and tar.ano = '".$parametro[0]."'
  and tar.mes = '".$parametro[1]."'
  and tar.usuario = '".$_SESSION["id_usuario"]."'
  union
  select 'Resultado', round(coalesce(sum(case when tip.tipo = 0 then tar.valor else 0 end - case when tip.id = 23 then tar.valor else 0 end), 0), 2)
  from tarefas tar, tipo tip
  where tar.tipo = tip.id 
  and tar.ano = '".$parametro[0]."'
  and tar.mes = '".$parametro[1]."'
  and tar.usuario = '".$_SESSION["id_usuario"]);

define("MAIOR_QTD_GASTO_CATEGORIA", "
  select tr.ano, tr.mes, tp.id, tp.descricao, count(1) as qtd
  from tarefas tr
  inner join tipo tp
  on tr.tipo = tp.id
  where ano ='".$parametro[0]."'
  and mes ='".$parametro[1]."'
  and tr.usuario='".$_SESSION["id_usuario"]."' 
  group by tr.ano,tr.mes,tp.id
  order by count(1) desc");

define("MAIOR_VALOR_GASTO_CATEGORIA", "
  select tr.ano, tr.mes, tp.id, tp.descricao, round((sum(valor)*(-1)),2) as valor
  from tarefas tr
  inner join tipo tp
  on tr.tipo = tp.id
  where ano ='".$parametro[0]."'
  and mes ='".$parametro[1]."'
  and tr.usuario='".$_SESSION["id_usuario"]."' 
  group by tr.ano,tr.mes,tp.id
  order by sum(valor) asc");


define("LISTAR_VALORES_DETALHES", "SELECT id,data, Item, tiporegistro ,valor FROM tarefas where ano =trim('".$parametro[0]."') and mes=trim('".$parametro[1] ."') and tipo =trim('".$parametro[2] ."')  ");
define("LISTAR_REGRAS", "SELECT tp.id,tp.descricao as regra, t.descricao as categoria, case when t.tipo =1 then 'Entrada' else 'Saida' end as tipo FROM tipo_palavras tp 
  left join tipo t on t.id = tp.tipo where  t.usuario='".$_SESSION["id_usuario"]."' 
  order by t.descricao, tp.descricao ");
define("LISTAR_CATEGORIAS_DETALHES", "SELECT id, descricao ,case when tipo =1 then 'Entrada' else 'Saida' end as tipo FROM `tipo` where  usuario='".$_SESSION["id_usuario"]."'    order by tipo");
define("LISTAR_ANOS_DISPONIVEIS", "SELECT  distinct ano as id, ano as valor FROM `tarefas` where ano <>0  and usuario='".$_SESSION["id_usuario"]."'   order by ano desc");

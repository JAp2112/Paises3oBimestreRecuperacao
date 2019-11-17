<?php

function idiomaPortugues($c)
{

    $resp = mysql_query("select c.name from country as c inner join countrylanguage as b on (b.CountryCode = c.Code) where (b.Language = 'Portuguese') and (b.IsOfficial='T')", $c);

    if(!$resp)
    {
        echo "erro na consulta $resp";
        echo mysql_error($c);
        mysql_close($c);
    }

    $linha = mysql_fetch_assoc($resp);

    if($linha)
    {
        echo "Países de língua portuguesa: <\br>"
        echo "<table><tr><th>Nome</th><tr>";
        while($linha)
        {
            echo "<tr><td>{$linha["name"]}</td></tr>";
            $linha = mysql_fetch_assoc($resp);
        }
        echo "</table>"
    }
}

function cidades_populacaoBrasileiras($c)
{

    $resp = mysql_query("select name, population from city where CountryCode = 'Bra' ", $c);

    if(!$resp)
    {
        echo "erro na consulta $resp";
        echo mysql_error($c);
        mysql_close($c);
    }

    $linha = mysql_fetch_assoc($resp);

    if($linha)
    {
        echo "Cidades do Brasil<\br>"
        echo "<table><tr><th>Nome</th><th>População</th><tr>";
        while($linha)
        {
            echo "<tr><td>{$linha["name"]}</td><td>{$linha["population"]}</td></tr>";
            $linha = mysql_fetch_assoc($resp);
        }
        echo "</table>"
    }
}

function ps_pop_expvidadesc_pib_SA($c)
{
    if(!mysql_select_db($c)
    {
        echo mysql_error($c);
        mysql_close($c);
    }

    $resp = mysql_query("select name, population, lifeExpectancy, gnp from country where Continent = 'South America' order by `lifeExpectancy` desc", $c);

    if(!$resp)
    {
        echo "erro na consulta $resp";
        echo mysql_error($c);
        mysql_close($c);
    }

    $linha = mysql_fetch_assoc($resp);

    if($linha)
    {
        echo "Paises Sul-Americanos<\br>"
        echo "<table><tr><th>Nome</th><th>População</th><th>Expectativa de Vida</th><th>PIB</th></tr>";
        while($linha)
        {
            echo "<tr><td>{$linha["name"]}</td><td>{$linha["population"]}</td></tr>";
            $linha = mysql_fetch_assoc($resp);
        }
        echo "</table>"
    }
}

function paisesAfricanos($c)
{
    if(!mysql_select_db($c)
    {
        echo mysql_error($c);
        mysql_close($c);
    }

    $resp = mysql_query("select name, population, lifeExpectancy, gnp from country where Continent = 'Africa' order by `gnp` desc", $c);

    if(!$resp)
    {
        echo "erro na consulta $resp";
        echo mysql_error($c);
        mysql_close($c);
    }

    $linha = mysql_fetch_assoc($resp);

    if($linha)
    {
        echo "Paises Sul-Americanos<\br>"
        echo "<tr><th>Nome</th><th>População</th><th>Expectativa de Vida</th><th>PIB</th></tr>";
        while($linha)
        {
            echo "<tr><td>{$linha["name"]}</td><td>{$linha["population"]}</td><td>{$linha["lifeExpectancy"]}</td><td>{$linha["gnp"]}</td></tr>";
            $linha = mysql_fetch_assoc($resp);
        }
        echo "</table>"
    }
}

$host = "localhost";
$usuario = "usuario";
$senha = "senha";
$banco = "world";
 
$c = mysqli_connect($host, $usuario, $senha, $banco);
 
if(!$c)
{
    echo "erro na conexão";
    echo mysqli_error($c);
    die();
}
 
if(!mysqli_select_db($c,$banco))
{
    echo "erro no select_db";
    echo mysqli_error($c);
    mysqli_close($c);
    die();
}

idiomaPortugues($c);
cidades_populacaoBrasileiras($c);
ps_pop_expvidadesc_pib_SA($c);
paisesAfricanos($c);


?>
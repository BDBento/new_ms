<?php 
/**
 *Template Name: Home
 *  
 *@package WordPress
 *@subpackage Tema 
 *@author bbento
 *@since 1.0.0
 */

$Servicos = get_theme_mod( 'servicos-destaque' ); 
$orgao = get_theme_mod( 'destaques-do-orgao' );
$orgao2 = get_theme_mod( 'destaques-do-orgao2' );
$instituicoes = get_theme_mod( 'instituicoes' );
$area_edicao = get_theme_mod( 'area-edicao' );


get_header();


if($Servicos){
    get_template_part( 'template-parts/home/servicos-destaque', 'Servico em destaque' );
}

get_template_part( 'template-parts/home/banner-gov', 'Banner Governo' );

if($orgao){
    get_template_part( 'template-parts/home/destaques-orgao', 'Destaques do Orgão' );
}
if($orgao2){
    get_template_part( 'template-parts/home/destaques-orgao2', 'destaques-do-orgao2' );
}

if($instituicoes){
    get_template_part( 'template-parts/home/instituicoes', 'Instituições' );
}
if($area_edicao){
    get_template_part( 'template-parts/home/area-edicao', 'Area de Edição' );
}

get_footer(); ?>


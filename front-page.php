<?php 
/**
 *Template Name: Home
 *  
 *@package WordPress
 *@subpackage Tema 
 *@author bbento
 *@since 1.0.0
 */

get_header();

get_template_part( 'template-parts/home/servicos-destaque', 'Servico em destaque' );

get_template_part( 'template-parts/home/banner-gov', 'Banner Governo' );

get_template_part( 'template-parts/home/destaques-orgao', 'Destaques do Orgão' );

get_template_part( 'template-parts/home/instituicoes', 'Instituições' );

get_template_part( 'template-parts/home/area-edicao', 'Area de Edição' );

get_footer();


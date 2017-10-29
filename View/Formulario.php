<?php

class Formulario
{

    private $nome;
    private $titulo;
    private $action;
    private $campos = array();
    private $methodCancelar;
    private $classCancelar;
    private $iconeSubmit;
    private $textoSubmit;

    public function __construct(string $nome, string $titulo)
    {
        $this->nome = $nome;
        $this->titulo = $titulo;
    }

    public function setAction(string $action)
    {
        $this->action = $action;
    }

    public function setActionCancelar(string $class, string $method)
    {
        $this->classCancelar = $class;
        $this->methodCancelar = $method;
    }

    public function adicionaCampo(iCampos $campo)
    {
        $this->campos[] = $campo;
    }

    public function alterarBotaoSubmit(string $rotulo, string $icone = ''): bool
    {
        $this->textoSubmit = $rotulo;
        if ($icone != '') {
            $this->iconeSubmit = $icone;
        }
        return true;
    }

    public function render()
    {
        $str = '<div class="panel panel-default" style="margin: 40px">';
        $str .= '<div class="panel-heading" >' . $this->titulo . '</div>';
        $str .= '<div class="panel-body">';
        $str .= '<form action="' . $this->action . '" name="' . $this->name . '" method="POST" class="form-horizontal">';
        foreach ($this->campos as $campo) {
            $str .= $campo->getHTML();
        }
        $str .= '"<div class="form-group">';
        $str .= '<div class="col-sm-offset-2 col-sm-8">';
        $textoSubmit = ($this->textoSubmit != NULL || $this->textoSubmit != '') ? $this->textoSubmit : 'Salvar';
        $iconeSubmit = ($this->iconeSubmit != NULL || $this->iconeSubmit != '') ? $this->iconeSubmit : 'glyphicon glyphicon-ok';
        $str .= '<button type="submit" class="btn btn-success"><i class="' . $iconeSubmit . '"></i>' . $textoSubmit . '</button>';
        $str .= '<a href="?class=' . $this->classCancelar . '&method=' . $this->methodCancelar . '" class="btn btn-info" /><span class="glyphicon glyphicon-remove"></span> Cancelar</a>';
        $str .= '</div>';
        $str .= '</div>';
        $str .= '</form>';
        $str .= '</div>';
        $str .= '</div>';
        $str .= '</div>';
        echo $str;
    }
}

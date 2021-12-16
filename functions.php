<?php

function creneaux_html(array $creneaux){
    if(empty($creneaux)){
        return 'Fermé';
    }
    $phrases = [];
    foreach ($creneaux as $creneau){
        $phrases[] = "<strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h </strong>";
    }
    return 'Ouvert de: ' . implode(' et ', $phrases);
}


function in_creneaux(int $heure, array $creneaux): bool
{
    foreach($creneaux as $creneau){
        $debut = $creneau[0];
        $fin = $creneau[1];   
        if($heure >= $debut && $heure < $fin){
            return true;
        }
    }
    return false;
}

function select_option(string $name, $value, array $options): string {
    $html_options = [];
    foreach($options as $k => $option){
        $attributes = $k == $value ? ' selected' : '';
        $html_options[] = "<option value='$k' $attributes>$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) . '</select>';
}
?>
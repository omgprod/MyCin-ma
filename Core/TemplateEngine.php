<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 27/09/2018
 * Time: 13:12
 */

namespace Core;


class TemplateEngine
{
    private $regex = [
        "/{{(.+)}}/" => "<?= htmlspecialchars ($1) ?>",
        "/@(if|elseif|switch|foreach|case)(.+)\N?/" => "<?php $1$2 :?>",
        "/@else(.+)\N?/" => "<?php else :?>",
        "/@end(elseif|switch|foreach)\N?/" => "<?php end$1 : ?>",
        "/@endif\N?/" => "<?php endif; ?>",
        "/@(\w+\s?)\((.+)\)\N?/" => "<?php if($1($2)) : ?>",
        "/@(.+)\N/" => "<?php $1; ?>",
        "/(\r)/" => ""];

    public function parseView($view)
    {
        $old = file_get_contents($view);
        foreach ($this->regex as $p => $r) {
            $old = preg_replace($p, $r, $old);
        }
        file_put_contents( 'src/View/temp.php', $old);
        return $old;
    }

}
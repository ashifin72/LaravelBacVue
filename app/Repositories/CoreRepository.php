<?php
/**
 * Created by PhpStorm.
 * User: Sasha San
 * Date: 21.05.2019
 * Time: 11:43
 */

namespace App\Repositories;

use App\Models\locale;
use Illuminate\Database\Eloquent\Model;
use function PHPSTORM_META\elementType;


abstract class CoreRepository
{


    /**
     * с какой моделью он работает
     * Illuminate\Database\Eloquent\Model;
     * @var Model
     */
    protected $model;


    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();


    /**
     * @return Model|\Illuminate\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }



    public function getAllWithPaginate($perPage = null, $columns = [])
    {
        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('sort', 'DESC')
            ->paginate($perPage);

        return $result;
    }


    public function getEditId($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getEditSlug($slug, $column = 'slug')
    {
        return $this
            ->startConditions()
            ->where($column, '=', $slug)
            ->first();
    }


    public function issetItem($item)
    {
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись [{$id}] не найденна!"])
                ->withInput();
        }
    }
  function json2array($json){

    if(get_magic_quotes_gpc()){
      $json = stripslashes($json);
    }
    $json = substr($json, 1, -1);

    $json = str_replace(array(":", "{", "[", "}", "]"), array("=>", "array(", "array(", ")", ")"), $json);

    @eval("\$json_array = array({$json});");

    return $json_array;

  }



    public function resultRecording($result, $route, $id = null)
    {
        if ($result) {
            return redirect()->route($route, $id)
                ->with(['success' => 'Успешное сохраненно!']);
        } else {
            return back()
                // если есть ошибка выдай и отправь назад на исходную точку с сохранением данных в инпуте
                ->withErrors(['msg' => 'Ошибка сохранения!',])
                ->withInput();
        }
    }


    /**
     * @return Model
     */
    public function getIdLocale()
    {
        if (session('Locale') && session('Locale') == 'uk') {
            $id_local = 2;
        } else {
            $id_local = 1;
        }
        return $id_local;
    }

    /**
     * получаем активные  локали для вывода вадминке
     */
    public function getActiveLocales()
    {
        $locales = Locale::where('status', '=', '1')->orderBy('sort', 'desc')->get(array('local'));
        return $locales;
    }


}

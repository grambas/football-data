<?php 
namespace Grambas\FootballData\Facades;

use Illuminate\Support\Facades\Facade;


class FootballDataFacade extends Facade {

     /**
   * Get the registered name of the component.
  *
 * @return string
 */
protected static function getFacadeAccessor() { return 'football'; }
}
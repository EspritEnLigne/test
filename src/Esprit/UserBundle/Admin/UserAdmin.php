<?php
namespace Esprit\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
/**
 * Description of EspritAdmin
 *
 * @author abdelaziz
 */
class UserAdmin  extends Admin{
    
    public function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with('General')  
           ->add('username')
           ->add('email')
           ->add('password')
      ->end()
    ;
  }
 
  public  function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
      ->add('username')
      ->add('email')
      ->add('password')
    ;
  }
 
  public  function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('id')
      ->add('username')
      ->add('email')
      ->add('password')
      ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))      
    ;
  }
// public function  configureShowFields(ShowMapper $showMapper){
//    $showMapper
//       ->add('username')
//      ->add('email')
//      ->add('password');
//     
//     
//}
}
?>

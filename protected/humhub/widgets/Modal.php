<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\widgets;

use yii\base\Widget;

/**
 * AjaxButton is an replacement for Yii1 CHtml::AjaxButton
 *
 * @author luke
 */
class Modal extends Widget
{
    /**
     * Unique modal container id
     * @var type 
     */
    public $id;
    
    /**
     * Header text
     * @var type 
     */
    public $header;
    
    /**
     * Modal content
     * @var type 
     */
    public $body;
    
    /**
     * Modal footer
     * @var type 
     */
    public $footer;
    
    /**
     * This setting will have impact on on the modal dialog size.
     * Possible values:
     *  - normal
     *  - large
     *  - small
     *  - extra-small
     *  - medium
     * @var string 
     */
    public $size;
    
    /**
     * Can be used to add an open animation for the dialog.
     * e.g: pulse
     * 
     * @var string 
     */
    public $animation;
    
    /**
     * Can be set to true to force the x close button to be rendered even if
     * there is no headtext available, or set to false if the button should not
     * be rendered.
     * 
     * @var type 
     */
    public $showClose;
    
    /**
     * Defines if a click on the modal background should close the modal
     * @var type 
     */
    public $backdrop = true;
    
    /**
     * Defines if the modal can be closed by pressing escape
     * @var type 
     */
    public $keyboard = true;
    
    /**
     * Defines if the modal should be shown at startup
     * @var type 
     */
    public $show = false;
    
    /**
     * Defines if the modal should be shown at startup
     * @var type 
     */
    public $centerText = false;
    
    /**
     * If true, the modal root is not rendered, this is especially used by remote modals
     * @var type 
     */
    public $dialogOnly = false;
    
    /**
     * Can be set to false if the modal body should not be initialized with an
     * loader animation. Default is true, if no body is provided.
     * 
     * @var type 
     */
    public $initialLoader;
    
    public function run()
    {
        $dialogClass = 'modal-dialog';
        $dialogClass .= ($this->size != null) ? ' modal-dialog-'.$this->size : '';
        $dialogClass .= ($this->animation != null) ? ' animated '.$this->animation : '';
        
        $bodyClass = 'modal-body';
        $bodyClass .= ($this->centerText) ? ' text-center' : '';
        
        //The x close button is rendered by default either if forced by showClose or a headertext is given
        $showClose = ($this->showClose != null) ? $this->showClose : ($this->header != null);
        
        $this->initialLoader = ($this->initialLoader ==! null) ? $this->initialLoader : ($this->body === null);
       
        $modalData = '';
        $modalData .= !$this->backdrop ? 'data-backdrop="static"' : '';
        $modalData .= !$this->keyboard ? 'data-keyboard="false"' : '';
        $modalData .= $this->show ? 'data-show="true"' : '';
        
        return $this->render('modal', [
            'id' => $this->id,
            'header' => $this->header,
            'body' => $this->body,
            'bodyClass' => $bodyClass,
            'footer' => $this->footer,
            'dialogClass' => $dialogClass,
            'modalData' => $modalData,
            'showClose' => $showClose,
            'initialLoader' => $this->initialLoader,
            'dialogOnly' => $this->dialogOnly
        ]);
    }

}

<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class CustomCartText extends Module
{
    public function __construct()
    {
        $this->name = 'customcarttext';
        $this->tab = 'front_office_features';
        $this->version = '0.0.2';
        $this->author = 'Jaymian-Lee Reinartz';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Custom Cart Text');
        $this->description = $this->l('Displays custom text in the cart.');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayCustomCartText');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayCustomCartText($params)
    {
        $this->context->smarty->assign(array(
            'custom_text' => Configuration::get('CUSTOMCARTTEXT_CUSTOM_TEXT')
        ));

        return $this->display(__FILE__, 'views/templates/hook/displayCustomCartText.tpl');
    }

    public function getContent()
    {
        $output = null;

        if (Tools::isSubmit('submit'.$this->name)) {
            $customText = strval(Tools::getValue('CUSTOMCARTTEXT_CUSTOM_TEXT'));
            if (!$customText || empty($customText) || !Validate::isGenericName($customText)) {
                $output .= $this->displayError($this->l('Invalid Configuration value'));
            } else {
                Configuration::updateValue('CUSTOMCARTTEXT_CUSTOM_TEXT', $customText);
                $output .= $this->displayConfirmation($this->l('Settings updated'));
            }
        }

        return $output.$this->displayForm();
    }

    public function displayForm()
    {
        $defaultLang = (int)Configuration::get('PS_LANG_DEFAULT');
        $fieldsForm[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Settings'),
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Custom Text'),
                    'name' => 'CUSTOMCARTTEXT_CUSTOM_TEXT',
                    'size' => 20,
                    'required' => true
                )
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right'
            )
        );

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        $helper->default_form_language = $defaultLang;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->title = $this->displayName;
        $helper->show_toolbar = true;
        $helper->toolbar_scroll = true;
        $helper->submit_action = 'submit'.$this->name;
        $helper->toolbar_btn = array(
            'save' => array(
                'desc' => $this->l('Save'),
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
            ),
            'back' => array(
                'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->l('Back to list')
            )
        );

        $helper->fields_value['CUSTOMCARTTEXT_CUSTOM_TEXT'] = Configuration::get('CUSTOMCARTTEXT_CUSTOM_TEXT');

        return $helper->generateForm($fieldsForm);
    }
}
?>

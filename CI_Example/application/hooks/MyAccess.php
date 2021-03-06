<?php
class MyAccess
{
    protected $_CI;
    public function __construct()
    {
        $this->_CI =& get_instance();
        $this->_CI->zend->load('Zend_Acl');
    }

    public function setRoles()
    {
        $this->_CI->Zend_Acl->addRole(new Zend_Acl_Role('guest'));
        $this->_CI->Zend_Acl->addRole(new Zend_Acl_Role('member'), 'guest');
        $this->_CI->Zend_Acl->addRole(new Zend_Acl_Role('admin'), 'member');
    }

    public function setResource()
    {
        $this->_CI->Zend_Acl->add(new Zend_Acl_Resource('user'));
        $this->_CI->Zend_Acl->add(new Zend_Acl_Resource('demo'));
    }

    public function setAccess()
    {
        $this->_CI->Zend_Acl->allow('guest', 'demo', array('index', 'error'));
        $this->_CI->Zend_Acl->allow('member', 'user', array('add', 'edit', 'index'));
        $this->_CI->Zend_Acl->allow('admin');
    }

    public function checkAccess()
    {
        $controller = $this->_CI->router->fetch_class();
        $action = $this->_CI->router->fetch_method();
        $role = 'member';
        $this->setRoles();
        $this->setResource();
        $this->setAccess();

        if (!$this->_CI->Zend_Acl->isAllowed($role, $controller, $action)) {
            redirect(base_url(). 'index.php/role/demo/error');
        }
    }
}
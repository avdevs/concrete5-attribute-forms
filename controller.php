<?php
namespace Concrete\Package\AttributeForms;

use Concrete\Core\Backup\ContentImporter,
    Package;

class Controller extends Package
{
    protected $pkgHandle = 'attribute_forms';
    protected $appVersionRequired = '5.7.5.2';
    protected $pkgVersion = '0.9.9.1';

    protected $pkgAutoloaderMapCoreExtensions = true;
    
    public function getPackageName()
    {
        return t('Attribute Form');
    }

    public function getPackageDescription()
    {
        return t('A package to create forms using attributes');
    }

    protected function installXmlContent()
    {
        $pkg = Package::getByHandle($this->pkgHandle);

        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/install.xml');
    }

    public function install()
    {
        parent::install();
        $this->installXmlContent();
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installXmlContent();
    }

    public function uninstall()
    {
        parent::uninstall();
        $db = \Database::connection();
        
        $platform = $db->getDatabasePlatform();
        $db->executeQuery($platform->getDropTableSQL('btAttributeForm'));
        $db->executeQuery($platform->getDropTableSQL('AttributeFormsAttributeValues'));
        $db->executeQuery($platform->getDropTableSQL('AttributeForms'));
        $db->executeQuery($platform->getDropTableSQL('AttributeFormTypes'));
        $db->executeQuery($platform->getDropTableSQL('atAttributeSwitcher'));
        $db->executeQuery($platform->getDropTableSQL('atAttributeSwitcherSettings'));
        $db->executeQuery($platform->getDropTableSQL('AttributeFormsIndexAttributes'));
    }
}
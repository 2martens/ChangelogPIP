<?php
//wcf imports
require_once(WCF_DIR.'lib/acp/package/plugin/AbstractPackageInstallationPlugin.class.php');

/**
 * This PIP shows a changelog file.
 *
 * @author Jim Martens
 * @copyright 2011 Jim Martens
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 * @package de.plugins-zum-selberbauen.changelog
 * @subpackage acp.package.plugin
 * @category Community Framework
 */
class ChangelogPackageInstallationPlugin extends AbstractPackageInstallationPlugin {
    public $tagName = 'changelog';
    
    /**
     * Shows the changelog.
     */
    public function install() {
        parent::install();
        
        // get installation path of package
		$sql = "SELECT	packageDir
			FROM	wcf".WCF_N."_package
			WHERE	packageID = ".$this->installation->getPackageID();
		$packageDir = WCF::getDB()->getFirstRow($sql);
		$packageDir = $packageDir['packageDir'];
		
		//get path of changelog file
		$changelogTag = $this->installation->getXMLTag($this->tagName);
		$path = FileUtil::getRealPath(WCF_DIR.$packageDir);
		
		//show the changelog
		$this->show($path.$changelogTag['cdata']);
		
    }
    
    /**
     * Shows the changelog file.
     *
     * @param string $filename
     */
    protected function show($filename) {
        $content = StringUtil::trim(file_get_contents($filename));
        WCF::getTPL()->assign('content', $content);
        WCF::getTPL()->display('packageInstallationChangelog');
    }
    
    /**
     * Changelog file is part of the files PIP.
     *
     * @return boolean false
     */
    public function hasUninstall() {
        return false;
    }
    
    /**
     * Does nothing.
     */
    public function uninstall() {}
}
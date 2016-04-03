/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'zh-cn';
	// config.uiColor = '#AADC6E'; 
    // config.filebrowserUploadUrl = '/Util/Upload/ckeditor';
    // 
    config.filebrowserBrowseUrl = '/Public/3rd/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/Public/3rd/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserFlashBrowseUrl = '/Public/3rd/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserUploadUrl = '/Public/3rd/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/Public/3rd/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserFlashUploadUrl = '/Public/3rd/kcfinder/upload.php?opener=ckeditor&type=files';
};

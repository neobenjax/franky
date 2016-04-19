/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    config.toolbarGroups = [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'forms', groups: [ 'forms' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'insert', groups: [ 'insert' ] },
        '/',
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'tools', groups: [ 'tools' ] },
        { name: 'others', groups: [ 'others' ] },
        { name: 'about', groups: [ 'about' ] }
    ];
    config.height = 350;
    config.format_tags = 'p;h2';
    config.removePlugins = 'iframe';//Esto remueve el placeholder fake de iframes
    //config.format_tags = 'p;h2';
    config.forcePasteAsPlainText = true;
    //config.extraPlugins = 'uploadimage,uploadwidget,widget,filetools,notificationaggregator,notification,lineutils';    
     //config.imageUploadUrl = '/uploader/upload.php?type=Images';
    config.extraPlugins = 'youtube';
    config.removeButtons = 'Save,NewPage,Preview,Print,Source,Templates,Cut,Paste,Copy,PasteText,PasteFromWord,Replace,Find,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,Outdent,Indent,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Font,FontSize,Styles,TextColor,BGColor,Maximize,ShowBlocks,About';
};
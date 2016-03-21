<?php

// Extension details
$extDetailsFieldsetLayout = new OOUI\FieldsetLayout( array(
	'label' => 'General details',
	'classes' => array( 'mwstew-ui-form-fieldsets-general' ),
	'items' => array(
		// Name
		new OOUI\FieldLayout(
			new OOUI\TextInputWidget( array(
				'placeholder' => 'MyMWExtension',
				'required' => true,
				'name' => 'ext_name',
			) ),
			array(
				'label' => 'Extension name (no spaces)',
				// 'help' => 'Your extension name. Cannot have spaces.',
				'align' => 'left',
			)
		),
		// title
		new OOUI\FieldLayout(
			new OOUI\TextInputWidget( array(
				'placeholder' => 'My Mediawiki Extension',
				'name' => 'ext_display_name',
			) ),
			array(
				'label' => 'Extension title (If not given, the extension name will be used)',
				// 'help' => 'Your extension human-readable name.',
				'align' => 'left',
			)
		),
		// Author
		new OOUI\FieldLayout(
			new OOUI\TextInputWidget( array(
				'placeholder' => 'Your name',
				'required' => true,
				'name' => 'ext_author',
			) ),
			array(
				'label' => 'Extension author',
				// 'help' => 'Tell us who the author is. This will be public; you can use your real name or the username people know you by.',
				'align' => 'left',
			)
		),
		// Version
		new OOUI\FieldLayout(
			new OOUI\TextInputWidget( array(
				'placeholder' => '0.0.0',
				'name' => 'ext_version',
			) ),
			array(
				'label' => 'Extension version',
				// 'help' => 'The version of this extension. Defaults to 0.0.0'
				'align' => 'left',
			)
		),
		// Description
		new OOUI\FieldLayout(
			new OOUI\TextInputWidget( array(
				'placeholder' => 'Description',
				'multiline' => true,
				'rows' => 3,
				'name' => 'ext_description',
			) ),
			array(
				'label' => 'Extension description',
				// 'help' => 'Describe what your extension does.'
				'align' => 'left',
			)
		),
		// URL
		new OOUI\FieldLayout(
			new OOUI\TextInputWidget( array(
				'placeholder' => 'https://www.mediawiki.org/wiki/Extension:YourExtension',
				'name' => 'ext_url',
			) ),
			array(
				'label' => 'Extension URL',
				// 'help' => 'A URL for the extension details.',
				'align' => 'left',
			)
		),
		// License
		new OOUI\FieldLayout(
			// new OOUI\RadioSelectInputWidget( array(
			new OOUI\DropdownInputWidget( array(
				// 'placeholder' => 'Your extension license',
				'required' => true,
				'name' => 'ext_license',
				'options' => array(
					array( 'data' => 'MIT', 'label' => 'MIT' ),
					array( 'data' => 'GPL-2.0', 'label' => 'GPL v2' ),
					array( 'data' => 'GPL-2.0+', 'label' => 'GPL v2 and above' ),
					array( 'data' => 'LGPL-2.0', 'label' => 'LGPL v2' ),
					array( 'data' => 'LGPL-2.0+', 'label' => 'LGPL v2 and above' ),
					array( 'data' => 'LGPL-3.0', 'label' => 'LGPL v3' ),
				)
			) ),
			array(
				'label' => 'Extension license',
				// 'help' => 'Choose an extension license. MIT License is prefered; all extensions should be open source license.',
				'align' => 'left',
			)
		),
	),
) );

// Extension development details
$extDevelopmentFieldsetLayout = new OOUI\FieldsetLayout( array(
	'label' => 'Development environment',
	'classes' => array( 'mwstew-ui-form-fieldset-development' ),
	'items' => array(
		// PHP Development
		new OOUI\FieldLayout(
			new OOUI\CheckboxInputWidget( array(
				'name' => 'ext_dev_php',
				'value' => 1,
			) ),
			array(
				'label' => 'PHP development tools',
				'align' => 'inline',
				'help' => 'Select if your extension has PHP pieces, to add PHP development tools.',
			)
		),
		// Javascript Development
		new OOUI\FieldLayout(
			new OOUI\CheckboxInputWidget( array(
				'name' => 'ext_dev_js',
				'value' => 1,
			) ),
			array(
				'label' => 'JavaScript development tools',
				'align' => 'inline',
				'help' => 'Select if your extension has JavaScript modules, to add JavaScript development tools.',
			)
		)
	)
) );

// Special page
$extSpecialPageFieldsetLayout = new OOUI\FieldsetLayout( array(
	'label' => 'Special page',
	'classes' => array( 'mwstew-ui-form-fieldsets-specialpage' ),
	'items' => array(
		// Name
		new OOUI\FieldLayout(
			new MWStew\PrefixedTextInputWidget( array(
				'placeholder' => 'MyExtensionPage',
				'name' => 'ext_specialpage_name',
				'prefix' => 'Special:',
			) ),
			array(
				'label' => 'Special page name',
				'align' => 'left',
			)
		),
		// Title
		new OOUI\FieldLayout(
			new OOUI\TextInputWidget( array(
				'placeholder' => 'Welcome to MyExtension',
				'name' => 'ext_specialpage_title',
			) ),
			array(
				'label' => 'Special page title',
				'align' => 'left',
			)
		),
		// Text
		new OOUI\FieldLayout(
			new OOUI\TextInputWidget( array(
				'placeholder' => 'An introduction to Special:MyExtension page.',
				'name' => 'ext_specialpage_intro',
				'multiline' => true,
				'rows' => 3
			) ),
			array(
				'label' => 'Special page introduction',
				'align' => 'left',
			)
		),
	)
) );

// Extension hooks
$hookFields = array();
$hooks = array(
	'AlternateEdit' => 'This hook gets called at the beginning of &action=edit, before any user permissions are checked or any edit checking is performed.',
	'AlternateEditPreview' => 'This hook gets called at the beginning of &action=edit, before any user permissions are checked or any edit checking is performed.',
	'EditFilter' => 'Perform checks on an edit.',
	'EditFormPreloadText' => 'Called when edit page for new article is shown.',
	'EditPage::attemptSave' => 'Called before an article is saved, that is at the beginning of internalAttemptSave() is called.',
);
foreach ( $hooks as $hook => $desc ) {
	$hookFields[] = new OOUI\FieldLayout(
		new OOUI\CheckboxInputWidget( array(
			'name' => 'ext_hooks[]',
			'value' => $hook,
		) ),
		array(
			'label' => $hook,
			'align' => 'inline',
			'help' => $desc,
		)
	);
}

$extHooksFieldsetLayout = new OOUI\FieldsetLayout( array(
	'label' => 'Extension hooks',
	'classes' => array( 'mwstew-ui-form-fieldset-hooks' ),
	'items' => $hookFields,
) );

// Form
$form = new OOUI\FormLayout( array(
	'method' => 'post',
	'action' => 'download.php',
	'classes' => array( 'mwstew-ui-form' )
) );

// Submit button
$submitFieldsetLayout = new OOUI\FieldsetLayout( array(
	'classes' => array( 'mwstew-ui-form-fieldsets-submit' ),
	'items' => array(
		new OOUI\ButtonInputWidget( array(
			'label' => 'Create boilerplate',
			'classes' => array( 'mwstew-ui-form-fieldsets-submit-button' ),
			'type' => 'submit',
			'flags' => array( 'primary', 'progressive' ),
		) )
	),
) );

// Build the form
$form->addItems( array(
	$extDetailsFieldsetLayout,
	$extDevelopmentFieldsetLayout,
	$extSpecialPageFieldsetLayout,
	$extHooksFieldsetLayout,
	$submitFieldsetLayout,
) );

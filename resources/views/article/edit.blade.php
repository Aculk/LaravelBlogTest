@extends('layout/main')

@section('page-title')
Изменение статьи
@endsection

@section('content')
    <h1>Изменение статьи</h1>
    <a href="/" class="back-button">На главную</a>
    {!! Form::open(['class' => 'article-form', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::label('title', 'Название статьи') }}
        {{ Form::text('title', $article->title, ['placeholder' => 'Введите название статьи']) }}

        {{ Form::label('anons', 'Анонс статьи') }}
        {{ Form::textarea('anons', $article->anons, ['placeholder' => 'Введите анонс статьи']) }}

		{{ Form::label('main_image', 'Фото статьи') }}
		{{ Form::file('main_image') }}

        {{ Form::label('text', 'Основной текст статьи') }}
        {{ Form::textarea('text', $article->text, ['placeholder' => 'Введите текст статьи', 'id' => 'editor']) }}

        {{ Form::submit('Изменить', ['class' => 'add-button']) }}

    {!! Form::close() !!}
    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js" crossorigin></script>
    <script>
		const {
	ClassicEditor,
	Autosave,
	BlockQuote,
	Bold,
	Essentials,
	Heading,
	Indent,
	IndentBlock,
	Italic,
	Link,
	Paragraph,
	SpecialCharacters,
	Table,
	TableCaption,
	TableCellProperties,
	TableColumnResize,
	TableProperties,
	TableToolbar,
	Underline
} = window.CKEDITOR;

const LICENSE_KEY =
	'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3Mzc3NjMxOTksImp0aSI6ImNlYTI2MmY5LWEwYjAtNGM3ZS1iNGI0LWRhN2IxYTQ5NDhlNCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6ImViZmM2YjZmIn0.LZmmeQcEl_HUGcrvs5LazZCUIJIMmDgpaMFF8Gi4Nj8gXth3sEsh16yyg14BODhT5AXCfmF7RCIVVNlQIHgdkg';

const editorConfig = {
	toolbar: {
		items: [
			'heading',
			'|',
			'bold',
			'italic',
			'underline',
			'|',
			'specialCharacters',
			'link',
			'insertTable',
			'blockQuote',
			'|',
			'outdent',
			'indent'
		],
		shouldNotGroupWhenFull: false
	},
	plugins: [
		Autosave,
		BlockQuote,
		Bold,
		Essentials,
		Heading,
		Indent,
		IndentBlock,
		Italic,
		Link,
		Paragraph,
		SpecialCharacters,
		Table,
		TableCaption,
		TableCellProperties,
		TableColumnResize,
		TableProperties,
		TableToolbar,
		Underline
	],
	heading: {
		options: [
			{
				model: 'paragraph',
				title: 'Paragraph',
				class: 'ck-heading_paragraph'
			},
			{
				model: 'heading1',
				view: 'h1',
				title: 'Heading 1',
				class: 'ck-heading_heading1'
			},
			{
				model: 'heading2',
				view: 'h2',
				title: 'Heading 2',
				class: 'ck-heading_heading2'
			},
			{
				model: 'heading3',
				view: 'h3',
				title: 'Heading 3',
				class: 'ck-heading_heading3'
			},
			{
				model: 'heading4',
				view: 'h4',
				title: 'Heading 4',
				class: 'ck-heading_heading4'
			},
			{
				model: 'heading5',
				view: 'h5',
				title: 'Heading 5',
				class: 'ck-heading_heading5'
			},
			{
				model: 'heading6',
				view: 'h6',
				title: 'Heading 6',
				class: 'ck-heading_heading6'
			}
		]
	},
	licenseKey: LICENSE_KEY,
	link: {
		addTargetToExternalLinks: true,
		defaultProtocol: 'https://',
		decorators: {
			toggleDownloadable: {
				mode: 'manual',
				label: 'Downloadable',
				attributes: {
					download: 'file'
				}
			}
		}
	},
	placeholder: '',
	table: {
		contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
	}
};

ClassicEditor.create(document.querySelector('#editor'), editorConfig);
		</script>
@endsection

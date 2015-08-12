@include('exposia-navigation::parsers.partials.modal_start', ['modal_type' => 'wysiwyg', 'key' => $key])
<div class="form-group">
    <label for="wysiwyg_input_{{ $key }}">@lang('exposia-navigation::parsers.wysiwyg.fields.content')</label>
    <textarea name="{{ $key }}[content]" class="form-control wysiwyg" rows="{{ $rows }}"
              id="wysiwyg_input_{{ $key }}">{{ $values['content'] }}</textarea>
</div>
@include('exposia-navigation::parsers.partials.modal_stop')
@include('exposia-navigation::parsers.partials.script', ['modal_type' => 'wysiwyg', 'key' => $key])
<script>
    tinymce.init({
        selector: "#wysiwyg_input_{{ $key }}",
        plugins: [
            "autolink link table"
        ],
        content_css: "",
        toolbar: "styleselect | bullist numlist | link | table",

        relative_urls: false,
        menubar: false,
        statusbar: false,
        extended_valid_elements: "table[*]",
        invalid_elements: "span",
        valid_styles: {
            "*": "text-align",
            "a": "",
            "strong": ""
        },
        link_class_list: [
            {title: 'Geen', value: ''},
            {title: 'Knop (primary)', value: 'btn btn-primary'},
            {title: 'Knop (warning)', value: 'btn btn-warning'},
            {title: 'Knop (info)', value: 'btn btn-info'},
            {title: 'Knop (danger)', value: 'btn btn-danger'},
            {title: 'Knop (success)', value: 'btn btn-success'}
        ]
    });
</script>
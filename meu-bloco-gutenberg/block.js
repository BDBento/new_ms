(function (blocks, element, blockEditor, components) {
    // Import necessary functions and components from the WordPress block editor library
    var el = element.createElement;
    var RichText = blockEditor.RichText;
    var MediaUpload = blockEditor.MediaUpload;
    var InspectorControls = blockEditor.InspectorControls;
    var Button = components.Button;
    var TextControl = components.TextControl;

    // Register a new block type with the WordPress block editor
    blocks.registerBlockType('my-theme/my-block', {
        // Set the title, icon, and category of the block
        title: 'Etapas do Programa',
        icon: 'smiley',
        category: 'widgets',
        // Define the attributes of the block
        attributes: {
            items: {
                type: 'array',
                default: [],
                source: 'query',
                selector: '.item-etapas-do-programa',
                query: {
                    title: {
                        type: 'string',
                        source: 'html',
                        selector: 'h2'
                    },
                    link: {
                        type: 'string',
                        source: 'attribute',
                        attribute: 'href',
                        selector: 'a'
                    },
                    image: {
                        type: 'string',
                        source: 'attribute',
                        attribute: 'src',
                        selector: 'img'
                    }
                }
            }
        },
        // Define the edit function for the block
        edit: function (props) {
            var items = props.attributes.items;
            var setAttributes = props.setAttributes;

            // Function to add a new item to the items array
            function addItem() {
                var newItem = {
                    title: '',
                    link: '',
                    image: ''
                };
                setAttributes({ items: items.concat(newItem) });
            }

            // Function to update an item in the items array
            function updateItem(index, key, value) {
                var newItems = items.slice();
                newItems[index][key] = value;
                setAttributes({ items: newItems });
            }

            // Function to remove an item from the items array
            function removeItem(index) {
                var newItems = items.slice();
                newItems.splice(index, 1);
                setAttributes({ items: newItems });
            }

            // Render the block editor interface
            return el('div', { className: 'div-etapas-do-programa' },
                el(InspectorControls, {},
                    el(Button, { isPrimary: true, onClick: addItem }, 'Adicionar Item')
                ),
                items.map(function (item, index) {
                    return el('div', { className: 'custom-block-item', key: index },
                        el(MediaUpload, {
                            onSelect: function (media) {
                                updateItem(index, 'image', media.url);
                            },
                            type: 'image',
                            render: function (obj) {
                                return el(Button, { onClick: obj.open },
                                     !item.image ? el ('img', {src: 'https://via.placeholder.com/100x80', style: {width: '100px', height: 'auto'}}) : el('img', { src: item.image, style: { width: '100px', height: 'auto' } })
                                );
                            }
                        }),
                        el(RichText, {
                            tagName: 'h2',
                            placeholder: 'Digite o título...',
                            value: item.title,
                            onChange: function (value) {
                                updateItem(index, 'title', value);
                            }
                        }),
                        el(TextControl, {
                            type: 'url',
                            placeholder: 'Digite o link...',
                            value: item.link,
                            onChange: function (value) {
                                updateItem(index, 'link', value);
                            }
                        }),
                        el(Button, {
                            isDestructive: true,
                            className: 'btn-remove-item',
                            onClick: function () {
                                removeItem(index);
                            }
                        }, 'Remover Item')
                    );
                })
            );
        },
        // Define the save function for the block
        save: function (props) {
            var items = props.attributes.items;
            // Render the saved block content
            return el('div', { className: 'div-etapas-do-programa' },
                items.map(function (item, index) {
                    return el('div', { className: 'item-etapas-do-programa', key: index },
                        el('a', { href: item.link, style: { textDecoration: 'none', color: 'inherit' } },
                            el('div', { className: 'item-etapas-do-programa-content' },
                                el('div', { className: 'item-etapas-do-programa-text' },
                                    el(RichText.Content, { tagName: 'h2', value: item.title })
                                ),
                                item.image && el('div', { className: 'item-etapas-do-programa-img' },
                                    el('img', { src: item.image, alt: item.title, style: { display: 'block', marginTop: '10px' } })
                                )
                            )
                        )
                    );
                })
            );
        }
    });
}(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor,
    window.wp.components
));

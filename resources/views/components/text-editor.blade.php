@props(['name', 'value' => ''])

<div x-data="textEditor(`{{ $value }}`)" x-init="init()" class="w-full">
    <!-- Toolbar -->
    <div class="flex items-center gap-2 flex-wrap bg-gray-100 border border-gray-300 rounded-t-md px-2 py-1">
        <!-- Text Style -->
        <button @click="formatText('bold')"
            :class="activeCommands.bold ? 'bg-blue-200 text-blue-700' : 'hover:bg-gray-200'" class="p-2 rounded"
            type="button"><b>B</b></button>

        <button @click="formatText('italic')"
            :class="activeCommands.italic ? 'bg-blue-200 text-blue-700' : 'hover:bg-gray-200'" class="p-2 rounded"
            type="button"><i>I</i></button>

        <button @click="formatText('underline')"
            :class="activeCommands.underline ? 'bg-blue-200 text-blue-700' : 'hover:bg-gray-200'" class="p-2 rounded"
            type="button"><u>U</u></button>

        <!-- Lists -->
        <button @click="formatText('insertUnorderedList')"
            :class="activeCommands.insertUnorderedList ? 'bg-blue-200 text-blue-700' : 'hover:bg-gray-200'"
            class="p-2 rounded" type="button">• List</button>

        <button @click="formatText('insertOrderedList')"
            :class="activeCommands.insertOrderedList ? 'bg-blue-200 text-blue-700' : 'hover:bg-gray-200'"
            class="p-2 rounded" type="button">1. List</button>

        <!-- Headings -->
        <select @change="formatText('formatBlock', $event.target.value)"
            class="border border-gray-300 rounded pl-2 pr-7 py-1 text-sm" :value="activeHeading">
            <option value="P">Paragraph</option>
            <option value="H1">Heading 1</option>
            <option value="H2">Heading 2</option>
            <option value="H3">Heading 3</option>
            <option value="H4">Heading 4</option>
            <option value="H5">Heading 5</option>
            <option value="H6">Heading 6</option>
        </select>

        <!-- Image Upload -->
        <input type="file" accept="image/*" @change="insertImage($event)" class="hidden" x-ref="imageInput" />
        <button @click="$refs.imageInput.click()" class="p-2 rounded hover:bg-gray-200" type="button"
            title="Insert Image">🖼️</button>

        <!-- Video Embed -->
        <button @click="openVideoPrompt()" class="p-2 rounded hover:bg-gray-200" type="button"
            title="Embed YouTube Video">🎥</button>
    </div>

    <!-- Editor -->
    <div x-ref="editor" @input="updateInput()" contenteditable="true"
        class="!w-full prose max-w-full border border-gray-300 p-4 rounded-b-md min-h-[240px] __editor__"></div>

    <!-- Hidden Input -->
    <input type="hidden" name="{{ $name }}" :value="content" />
</div>

<script>
    function textEditor(initialValue) {
        return {
            content: initialValue || "",
            activeCommands: {
                bold: false,
                italic: false,
                underline: false,
                insertUnorderedList: false,
                insertOrderedList: false,
            },
            activeHeading: "P",

            formatText(command, value = null) {
                document.execCommand(command, false, value);
                this.updateActiveCommands();
            },

            sanitizeContent(html) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, "text/html");

                doc.querySelectorAll("*").forEach((el) => {
                    // Remove class, style, id
                    el.removeAttribute("class");
                    el.removeAttribute("style");
                    el.removeAttribute("id");

                    // Remove data-* and on* attributes
                    Array.from(el.attributes).forEach(attr => {
                        if (/^on/i.test(attr.name) || attr.name.startsWith("data-")) {
                            el.removeAttribute(attr.name);
                        }
                    });
                });

                return doc.body.innerHTML;
            },

            updateInput() {
                this.content = this.sanitizeContent(this.$refs.editor.innerHTML);
            },

            updateActiveCommands() {
                this.activeCommands = {
                    bold: document.queryCommandState("bold"),
                    italic: document.queryCommandState("italic"),
                    underline: document.queryCommandState("underline"),
                    insertUnorderedList: document.queryCommandState("insertUnorderedList"),
                    insertOrderedList: document.queryCommandState("insertOrderedList"),
                };
                this.updateActiveHeading();
            },

            updateActiveHeading() {
                const selection = window.getSelection();
                if (!selection || selection.rangeCount === 0) return;

                const anchorNode = selection.anchorNode;
                const parent = anchorNode ? anchorNode.parentElement : null;
                this.activeHeading = "P";
                if (parent) {
                    const tag = parent.closest("h1,h2,h3,h4,h5,h6,p");
                    if (tag) {
                        this.activeHeading = tag.tagName;
                    }
                }
            },

            insertImage(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = () => {
                    const img = document.createElement("img");
                    img.src = reader.result;
                    img.alt = file.name;
                    img.classList.add("max-w-full", "my-2");

                    const range = window.getSelection().getRangeAt(0);
                    range.deleteContents();
                    range.insertNode(img);

                    this.updateInput();
                };
                reader.readAsDataURL(file);
            },

            openVideoPrompt() {
                const url = prompt("YouTube ভিডিও URL দিন:");
                if (url) {
                    const embedUrl = this.convertYoutubeUrl(url);
                    if (!embedUrl) return;

                    const iframe = document.createElement("iframe");
                    iframe.src = embedUrl;
                    iframe.width = "560";
                    iframe.height = "315";
                    iframe.setAttribute("frameborder", "0");
                    iframe.setAttribute("allowfullscreen", "true");
                    iframe.classList.add("my-4");

                    const range = window.getSelection().getRangeAt(0);
                    range.deleteContents();
                    range.insertNode(iframe);

                    this.updateInput();
                }
            },

            convertYoutubeUrl(url) {
                const reg = /(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/;
                const match = url.match(reg);
                if (match && match[1]) {
                    return `https://www.youtube.com/embed/${match[1]}`;
                }
                alert("YouTube URL সঠিক নয়");
                return "";
            },

            init() {
                this.$refs.editor.innerHTML = this.sanitizeContent(this.content);
                this.updateActiveCommands();
                document.addEventListener("selectionchange", () => {
                    this.updateActiveCommands();
                });
            },
        };
    }
</script>

<style>
    .__editor__ * {
        background-color: #fff !important;
        color: #000 !important
    }
</style>
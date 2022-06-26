<template>
	<div class="editor">
        <v-card class="shadow">
            <div class="sticky-top" style="z-index: 1">
                <v-card dark rounded="top" class="shadow-sm">
                    <v-card-text>
                        <editor-menu-bar :editor="editor" v-slot="{ commands, isActive }">
                            <div class="menubar">
                                <div class="toolbar">
                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        @click="commands.undo">
                                        <v-icon small>mdi-undo</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        @click="commands.redo">
                                        <v-icon small>mdi-redo</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.bold() }"
                                        @click="commands.bold">
                                        <v-icon small>mdi-format-bold</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.italic() }"
                                        @click="commands.italic">
                                        <v-icon small>mdi-format-italic</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.strike() }"
                                        @click="commands.strike">
                                        <v-icon small>mdi-format-strikethrough</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.underline() }"
                                        @click="commands.underline">
                                        <v-icon small>mdi-format-underline</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.code() }"
                                        @click="commands.code">
                                        <v-icon small>mdi-code-tags</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.paragraph() }"
                                        @click="commands.paragraph">
                                        <v-icon small>mdi-format-paragraph</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.heading({ level: 1 }) }"
                                        @click="commands.heading({ level: 1 })">H1</v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.heading({ level: 2 }) }"
                                        @click="commands.heading({ level: 2 })">H2</v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.heading({ level: 3 }) }"
                                        @click="commands.heading({ level: 3 })">H3</v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.bullet_list() }"
                                        @click="commands.bullet_list">
                                        <v-icon small>mdi-format-list-bulleted-type</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.ordered_list() }"
                                        @click="commands.ordered_list">
                                        <v-icon small>mdi-format-list-numbered</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.blockquote() }"
                                        @click="commands.blockquote">
                                        <v-icon small>mdi-format-quote-open</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        :class="{ 'is-active': isActive.code_block() }"
                                        @click="commands.code_block">
                                        <v-icon small>mdi-code-tags</v-icon>
                                    </v-btn>

                                    <v-btn
                                        icon
                                        class="menubar__button"
                                        @click="commands.createTable({rowsCount: 3, colsCount: 3, withHeaderRow: false })">
                                        <v-icon small>mdi-table</v-icon>
                                    </v-btn>

                                    <span v-if="isActive.table()">
                                        <v-btn
                                            icon
                                            class="menubar__button"
                                            @click="commands.deleteTable">
                                            <v-icon small>mdi-table-remove</v-icon>
                                        </v-btn>
                                        <v-btn
                                            icon
                                            class="menubar__button"
                                            @click="commands.addColumnBefore">
                                            <v-icon small>mdi-table-column-plus-before</v-icon>
                                        </v-btn>
                                        <v-btn
                                            icon
                                            class="menubar__button"
                                            @click="commands.addColumnAfter">
                                            <v-icon small>mdi-table-column-plus-after</v-icon>
                                        </v-btn>
                                        <v-btn
                                            icon
                                            class="menubar__button"
                                            @click="commands.deleteColumn">
                                            <v-icon small>mdi-table-column-remove</v-icon>
                                        </v-btn>
                                        <v-btn
                                            icon
                                            class="menubar__button"
                                            @click="commands.addRowBefore">
                                            <v-icon small>mdi-table-row-plus-before</v-icon>
                                        </v-btn>
                                        <v-btn
                                            icon
                                            class="menubar__button"
                                            @click="commands.addRowAfter">
                                            <v-icon small>mdi-table-row-plus-after</v-icon>
                                        </v-btn>
                                        <v-btn
                                            icon
                                            class="menubar__button"
                                            @click="commands.deleteRow">
                                            <v-icon small>mdi-table-row-remove</v-icon>
                                        </v-btn>
                                        <v-btn
                                            icon
                                            class="menubar__button"
                                            @click="commands.toggleCellMerge">
                                            <v-icon small>mdi-table-merge-cells</v-icon>
                                        </v-btn>
                                    </span>
                                </div>
                            </div>
                        </editor-menu-bar>
                    </v-card-text>
                    <v-divider></v-divider>
                </v-card>
            </div>
            <v-card-text>
                <editor-content class="editor__content py-3 article" :editor="editor" ></editor-content>
            </v-card-text>
        </v-card>
        <input type="hidden" name="isi" :value="content">
	</div>
</template>

<script>
	import { Editor, EditorContent, EditorMenuBar } from 'tiptap'
	import {
		Blockquote,
		CodeBlock,
		HardBreak,
		Heading,
		OrderedList,
		BulletList,
		ListItem,
		TodoItem,
		TodoList,
		Bold,
		Code,
		Italic,
		Link,
		Table,
		TableHeader,
		TableCell,
		TableRow,
		Strike,
		Underline,
		History,
	} from 'tiptap-extensions'
	export default {
        props: {
            value: String,
            hideToolbar: Boolean,
        },
		components: {
			EditorContent,
			EditorMenuBar,
			// Icon,
		},
		data() {
			return {
				editor: null
			}
        },
        computed: {
            content: {
                get(){
                    return this.value
                },
                set(val){
                    return this.$emit('input', val)
                }
            },
            mHideToolbar: {
                get(){ return this.hideToolbar },
                set(val){ this.$emit('update:hideToolbar', val) }
            }
        },
        methods: {
        },
		beforeDestroy() {
			this.editor.destroy()
        },
        watch: {
            value(val, old){
                if(old == null || old == ""){
                    this.editor.setContent(val)
                }
            }
        },
        created(){
            this.editor = new Editor({
                extensions: [
                    new Blockquote(),
                    new BulletList(),
                    new CodeBlock(),
                    new HardBreak(),
                    new Heading({ levels: [1, 2, 3] }),
                    new ListItem(),
                    new OrderedList(),
                    new TodoItem(),
                    new TodoList(),
                    new Link(),
                    new Bold(),
                    new Code(),
                    new Italic(),
                    new Strike(),
                    new Underline(),
                    new History(),
                    new Table({
                        resizable: true,
                    }),
                    new TableHeader(),
                    new TableCell(),
                    new TableRow(),
                ],
                content: this.content
            })

            this.editor.on('update', ({getHTML}) => {
                console.log("#", getHTML())
                this.content = getHTML()
            })
        }
	}
</script>
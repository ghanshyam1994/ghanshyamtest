"use strict";var __importDefault=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(exports,"__esModule",{value:!0}),exports.Edit=void 0;const element_1=require("@wordpress/element");require("@woocommerce/settings");const block_templates_1=require("@woocommerce/block-templates"),components_1=require("@woocommerce/components"),compose_1=require("@wordpress/compose"),data_1=require("@wordpress/data"),create_taxonomy_modal_1=require("./create-taxonomy-modal"),use_taxonomy_search_1=__importDefault(require("./use-taxonomy-search")),use_product_entity_prop_1=__importDefault(require("../../../hooks/use-product-entity-prop"));function Edit({attributes:e,context:{postType:t}}){const a=(0,block_templates_1.useWooBlockProps)(e),{hierarchical:o}=(0,data_1.useSelect)((t=>t("core").getTaxonomy(e.slug)||{hierarchical:!1})),{label:r,slug:n,property:l,createTitle:i,dialogNameHelpText:s,parentTaxonomyText:m}=e,[c,u]=(0,element_1.useState)(""),[p,_]=(0,element_1.useState)([]),{searchEntity:d,isResolving:y}=(0,use_taxonomy_search_1.default)(n,{fetchParents:o}),x=(0,compose_1.useDebounce)((0,element_1.useCallback)((e=>{u(e),d(e||"").then(_)}),[o]),150);(0,element_1.useEffect)((()=>{x("")}),[]);const[h,f]=(0,use_product_entity_prop_1.default)(l,{postType:t,fallbackValue:[]}),g=(h||[]).map((e=>({value:String(e.id),label:e.name}))),[b,v]=(0,element_1.useState)(!1),S=p.map((e=>({parent:o&&e.parent&&e.parent>0?String(e.parent):void 0,label:e.name,value:String(e.id)})));return(0,element_1.createElement)("div",{...a},(0,element_1.createElement)(element_1.Fragment,null,(0,element_1.createElement)(components_1.__experimentalSelectTreeControl,{id:(0,compose_1.useInstanceId)(components_1.__experimentalSelectTreeControl,"woocommerce-taxonomy-select"),label:r,isLoading:y,multiple:!0,createValue:c,onInputChange:x,shouldNotRecursivelySelect:!0,shouldShowCreateButton:e=>!e||-1===S.findIndex((t=>t.label.toLowerCase()===e.toLowerCase())),onCreateNew:()=>v(!0),items:S,selected:g,onSelect:e=>{Array.isArray(e)?f([...e.map((e=>({id:+e.value,name:e.label,parent:+(e.parent||0)}))),...h||[]]):f([{id:+e.value,name:e.label,parent:+(e.parent||0)},...h||[]])},onRemove:e=>{Array.isArray(e)?f((h||[]).filter((t=>!e.find((e=>e.value===String(t.id)))))):f((h||[]).filter((t=>String(t.id)!==e.value)))}}),b&&(0,element_1.createElement)(create_taxonomy_modal_1.CreateTaxonomyModal,{slug:n,hierarchical:o,title:i,dialogNameHelpText:s,parentTaxonomyText:m,onCancel:()=>v(!1),onCreate:e=>{v(!1),u(""),f([{id:e.id,name:e.name,parent:e.parent},...h||[]])},initialName:c})))}exports.Edit=Edit;
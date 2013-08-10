set nu!
" -----------------   Author: Ruchee
" -----------------    Email: my@ruchee.com
" -----------------  WebSite: http://www.ruchee.com
" -----------------     Date: 2013-07-20 17:16
" -----------------     For Windows, Cygwin and Linux


" 判断操作系统类型
if(has("win32") || has("win64"))
    let g:isWIN = 1
else
    let g:isWIN = 0
endif

" 判断是否处于GUI界面
if has("gui_running")
    let g:isGUI = 1
else
    let g:isGUI = 0
endif

" 设置工作地点标志
let g:atCompany = 0


" 设置头文件路径，以及tags路径，用于代码补全
if g:atCompany
    " set tags+=D:/Ruchee/workspace/www.qycn.com/tags
    " set tags+=D:/Ruchee/workspace/admin.qycn.com/tags
    " set tags+=D:/Ruchee/workspace/common/tags

    " set tags+=D:/Ruchee/workspace/Apps/php/tp_primer/ThinkPHP/tags
else
    " set tags+=D:/Develop/workspace/php/tp_primer/ThinkPHP/tags
endif


" 设置颜色模式和字体
if g:isWIN
    colorscheme molokai
    "colorscheme tango2
    "colorscheme blackboard
    set guifont=Monaco:h12
else
    colorscheme molokai
    "colorscheme tango2
    "colorscheme blackboard
    set guifont=Monaco\ 12
endif


" ======= 本配置文件使用指南 ======= "

" Windows下需要的软件：gvim、ctags
" Linux下需要的包文件：vim-gnome、exuberant-ctags
"
" 如遇文件格式问题，请转到vimfiles目录执行这条命令进行格式转换：find . -type f | xargs dos2unix
" tags文件可用这条命令生成，以C/C++为例：ctags -R --languages=c,c++
"
" 注意：Linux下必须使用GUI界面，否则Meta系按键将失效，可在.bashrc文件里面写入以下一行
" alias vim='gvim'
"
" 可使用下面两条命令使Linux和Windows共用同一套配置
" ln -s /your/path/for/gvim/vimfiles ~/.vim
" ln -s /your/path/for/gvim/_vimrc ~/.vimrc


" ---------- Ctrl系按键 ----------
"
" Ctrl + H                   --光标移当前行行首       [插入模式]
" Ctrl + J                   --光标移下一行行首       [插入模式]
" Ctrl + K                   --光标移上一行行尾       [插入模式]
" Ctrl + L                   --光标移当前行行尾       [插入模式]

" ---------- Meta系按键 ----------
"
" Alt  + H                   --光标左移一格           [插入模式]
" Alt  + J                   --光标下移一格           [插入模式]
" Alt  + K                   --光标上移一格           [插入模式]
" Alt  + L                   --光标右移一格           [插入模式]

" ---------- Leader系按键 ----------
"
" \c                         --复制至公共剪贴板
" \v                         --从公共剪贴板粘贴
"
" \T                         --加载语法模板           [全模式可用]
" \C                         --单源文件编译           [全模式可用]
" \R                         --单源文件运行           [全模式可用]
"
" \ww                        --打开Vimwiki主页
" \nt                        --打开NERDTree文件树窗口
" \tl                        --打开/关闭TagList/TxtBrowser窗口
" \ig                        --显示/关闭对齐线
" \bb                        --按=号对齐代码
" \bn                        --自定义对齐
" \rn                        --显示相对行号
" \nu                        --显示正常行号
"
" \cc                        --添加注释               [NERD_commenter]
" \cu                        --取消注释               [NERD_commenter]
" \cm                        --添加块注释             [NERD_commenter]
" \cs                        --添加SexStyle块注释     [NERD_commenter]
"
" \16                        --以十六进制格式查看
" \r16                       --返回普通格式
" \!                         --插入外部文件内容或外部命令的执行结果

" ---------- 补全命令 ----------
"
" <C-P>                      --单词补全
" <Tab>                      --语法结构补全           [snipMate插件]

" ---------- 格式化命令 ----------
"
" ==                         --缩进当前行
" =G                         --缩进直到文件结尾
" gg=G                       --缩进整个文件
" 行号G=行号G                --缩进指定区间

" u [小写]                   --单步复原               [非插入模式]
" U [大写]                   --整行复原               [非插入模式]
" Ctrl + R                   --撤消“撤消”操作         [非插入模式]
"
" ---------- 查看命令 ----------
"
" Ctrl+G                     --显示当前文件和光标的粗略信息
" g Ctrl+G                   --显示当前文件和光标的详细信息
"
" ---------- 搜索命令 ----------
"
" #                          --向前搜索当前光标所在字符
" *                          --向后搜索当前光标所在字符
" ?                          --向前搜索
" /                          --向后搜索
"
" ---------- 跳转命令 ----------
"
" Ctrl + ]                   --转到函数定义           [ctags跳转]
" Ctrl + T                   --返回调用函数           [ctags跳转]
" g Ctrl+]                   --列出可选跳转列表       [ctags跳转]

" 0 or ^ or $                --跳至行首/第一个非空字符/行尾
" %                          --在匹配的括号间跳跃
" { or }                     --按段落上/下跳跃
" f字符                      --跳至从当前光标开始本行第一个指定字符出现的位置
" gd                         --跳至当前光标所在单词首次出现的位置
" gf                         --打开当前光标所在的文件名，如果确实存在该文件的话
"
" [ Ctrl+D                   --跳至当前光标所在变量的首次定义位置 [从文件头部开始]
" [ Ctrl+I                   --跳至当前光标所在变量的首次出现位置 [从文件头部开始]
" [ D                        --列出当前光标所在变量的所有定义位置 [从文件头部开始]
" [ I                        --列出当前光标所在变量的所有出现位置 [从文件头部开始]
"
" ---------- 文本操作 ----------
"
" dw de d0 d^ d$ dd          --删除
" cw ce c0 c^ c$ cc          --删除并进入插入模式
" yw ye y0 y^ y$ yy          --复制
" vw ve v0 v^ v$ vv          --选中
"
" di分隔符                   --删除指定分隔符之间的内容
" ci分隔符                   --删除指定分隔符之间的内容并进入插入模式
" yi分隔符                   --复制指定分隔符之间的内容
" vi分隔符                   --选中指定分隔符之间的内容
"
" dt字符                     --删除本行内容，直到遇到第一个指定字符 [不包括该字符]
" ct字符                     --删除本行内容，直到遇到第一个指定字符并进入插入模式 [不包括该字符]
" yt字符                     --复制本行内容，直到遇到第一个指定字符 [不包括该字符]
" vt字符                     --选中本行内容，直到遇到第一个指定字符 [不包括该字符]
"
" ---------- 便捷操作 ----------
"
" Ctrl + N                   --多位置同时操作 [初选+向下增选]      [multiple-cursors插件]
" Ctrl + P                   --多位置同时操作 [向上减选]      [multiple-cursors插件]
" Ctrl + X                   --多位置同时操作 [向下跳选]      [multiple-cursors插件]
" m字符       and '字符      --标记位置 and 跳转到标记位置
" q字符 xxx q and @字符      --录制宏   and 执行宏

" ---------- Splitjoin.vim [代码形式转换插件] -----------------
"
" gJ                         --将多行代码集中成单行
" gS                         --将单行代码扩展成多行

" ---------- multiple-cursors [多位置操作] -----------------
"
" Ctrl + N                   --初选/向下增选
" Ctrl + P                   --向上减选
" Ctrl + X                   --向下跳选
" c or s                     --替换
" d                          --删除
" i or a or I or A           --插入
" <ESC>                      --离开选择模式

" ---------- Vimwiki [Vim中的wiki/blog系统] ----------------
"
" 链接：[[链接地址|链接描述]]
" 图片：{{图片地址||属性1="属性值" 属性2="属性值"}}
" 代码：{{{class="brush: cpp" 代码}}}



" 设置通用缩进策略
set shiftwidth=4
set tabstop=4

" 对部分语言设置单独的缩进
au FileType sh,scheme set shiftwidth=2
au FileType sh,scheme set tabstop=2

" 根据后缀名指定文件类型
au BufRead,BufNewFile *.txt setlocal ft=txt
au BufRead,BufNewFile *.di  setlocal ft=d
au BufRead,BufNewFile *.ss  setlocal ft=scheme


set backspace=2              " 设置退格键可用
set autoindent               " 自动对齐
set ai!                      " 设置自动缩进
set smartindent              " 智能自动缩进
"set nu!                     " 显示行号
"set relativenumber           " 开启相对行号
set mouse=a                  " 启用鼠标
set ruler                    " 右下角显示光标位置的状态行
set incsearch                " 开启实时搜索功能
set hlsearch                 " 开启高亮显示结果
set nowrapscan               " 搜索到文件两端时不重新搜索
set nocompatible             " 关闭兼容模式
"set vb t_vb=                " 关闭提示音 [会闪屏]
set hidden                   " 允许在有未保存的修改时切换缓冲区
set autochdir                " 设定文件浏览器目录为当前目录
set foldmethod=syntax        " 选择代码折叠类型
set foldlevel=100            " 禁止自动折叠
set laststatus=2             " 开启状态栏信息
set cmdheight=2              " 命令行的高度，默认为1，这里设为2
set writebackup              " 设置无备份文件
set autoread                 " 当文件在外部被修改时自动更新该文件
set nobackup
set list                     " 显示Tab符，使用一高亮竖线代替
set listchars=tab:\|\ ,
""set expandtab                " 将Tab自动转化成空格    [需要输入真正的Tab键时，使用 Ctrl+V + Tab]
"set showmatch               " 显示括号配对情况
"set nowrap                  " 设置不自动换行

syntax enable                " 打开语法高亮
syntax on                    " 开启文件类型侦测
filetype indent on           " 针对不同的文件类型采用不同的缩进格式
filetype plugin on           " 针对不同的文件类型加载对应的插件
filetype plugin indent on    " 启用自动补全
set completeopt=longest,menu "关掉智能补全时的预览窗口

" 设置文件编码和文件格式
set fenc=utf-8
set encoding=utf-8
set fileencodings=utf-8,gbk,cp936,latin-1
set fileformat=unix
set fileformats=unix,dos,mac
if g:isWIN
    source $VIMRUNTIME/delmenu.vim
    source $VIMRUNTIME/menu.vim
    language messages zh_CN.utf-8
endif


" 使用GUI界面时的设置
if g:isGUI
    " 启动时自动最大化窗口
    if g:isWIN
        au GUIEnter * simalt ~x
    endif
    "winpos 20 20            " 指定窗口出现的位置，坐标原点在屏幕左上角
    "set lines=20 columns=90 " 指定窗口大小，lines为高度，columns为宽度
    set guioptions+=c        " 使用字符提示框
    set guioptions-=m        " 隐藏菜单栏
    set guioptions-=T        " 隐藏工具栏
    "set guioptions-=L       " 隐藏左侧滚动条
    set guioptions-=r        " 隐藏右侧滚动条
    "set guioptions-=b       " 隐藏底部滚动条
    "set showtabline=0       " 隐藏Tab栏
    set cursorline           " 突出显示当前行
endif


" ======= 引号 && 括号自动匹配 ======= "

":inoremap ( ()<ESC>i

":inoremap ) <c-r>=ClosePair(')')<CR>

":inoremap { {}<ESC>i

":inoremap } <c-r>=ClosePair('}')<CR>

":inoremap [ []<ESC>i

":inoremap ] <c-r>=ClosePair(']')<CR>

":inoremap " ""<ESC>i

":inoremap ' ''<ESC>i

":inoremap ` ``<ESC>i

function ClosePair(char)
    if getline('.')[col('.') - 1] == a:char
        return "\<Right>"
    else
        return a:char
    endif
endf


" 加载pathogen插件管理器
execute pathogen#infect()


" MiniBufExplorer     多个文件切换 可使用鼠标双击相应文件名进行切换
let g:miniBufExplMapWindowNavVim=1
let g:miniBufExplMapWindowNavArrows=1
let g:miniBufExplMapCTabSwitchBufs=1
let g:miniBufExplModSelTarget=1

" :Tlist              调用TagList
let Tlist_Show_One_File=1                    " 只显示当前文件的tags
let Tlist_Exit_OnlyWindow=1                  " 如果Taglist窗口是最后一个窗口则退出Vim
let Tlist_Use_Right_Window=1                 " 在右侧窗口中显示
let Tlist_File_Fold_Auto_Close=1             " 自动折叠

" :LoadTemplate       根据文件后缀自动加载模板
if g:isWIN
    let g:template_path=$VIM.'/vimfiles/template/'
else
    let g:template_path='~/.vim/template/'
endif

" snipMate            Tab智能补全
let g:snips_author='Ruchee'
if g:isWIN
    let g:snippets_dir=$VIM.'/snippets/'
else
    let g:snippets_dir='~/.vim/snippets/'
endif
let g:snipMate                         = {}
let g:snipMate.scope_aliases           = {}
let g:snipMate.scope_aliases['c']      = 'cpp'
let g:snipMate.scope_aliases['php']    = 'php,html'
let g:snipMate.scope_aliases['smarty'] = 'smarty,html'
let g:snipMate.scope_aliases['xhtml']  = 'html'


" NERD_commenter      注释处理插件
let NERDSpaceDelims=1                        " 自动添加前置空格

" :AuthorInfoDetect   自动添加作者、时间等信息，本质是NERD_commenter && authorinfo的结合
let g:vimrc_author='Ruchee'                  " 昵称
let g:vimrc_email='my@ruchee.com'            " 邮箱
let g:vimrc_homepage='http://www.ruchee.com' " 个人主页

" Indent_guides       显示对齐线
let g:indent_guides_enable_on_vim_startup=0  " 默认关闭
let g:indent_guides_guide_size=1             " 指定对齐线的尺寸

" Syntastic           语法检查
let g:syntastic_check_on_open=1              " 默认开启


" ======= 自定义快捷键 ======= "

" Ctrl + H            光标移当前行行首
imap <c-h> <ESC>I

" Ctrl + J            光标移下一行行首
imap <c-j> <ESC><Down>I

" Ctrl + K            光标移上一行行尾
imap <c-k> <ESC><Up>A

" Ctrl + L            光标移当前行行尾
imap <c-l> <ESC>A

" Alt  + H            光标左移一格
imap <m-h> <Left>

" Alt  + J            光标下移一格
imap <m-j> <Down>

" Alt  + K            光标上移一格
imap <m-k> <Up>

" Alt  + L            光标右移一格
imap <m-l> <Right>

" \c                  复制至公共剪贴板
nmap <leader>c "+y
vmap <leader>c "+y

" \v                  从公共剪贴板粘贴
imap <leader>v <ESC>"+p
nmap <leader>v "+p
vmap <leader>v "+p

" \bb                 按=号对齐代码 [Tabular插件]
nmap <leader>bb :Tab /=<CR>

" \bn                 自定义对齐    [Tabular插件]
nmap <leader>bn :Tab /

" \nt                 打开NERDTree窗口，在左侧栏显示
nmap <leader>nt :NERDTree<CR>

" \tl                 打开Taglist/TxtBrowser窗口，在右侧栏显示
nmap <leader>tl :Tlist<CR><c-l>

" \16                 十六进制格式查看
nmap <leader>16 <ESC>:%!xxd<ESC>

" \r16                返回普通格式
nmap <leader>r16 <ESC>:%!xxd -r<ESC>

" \!                  插入外部文件或外部命令的执行结果
nmap <leader>! <ESC>:r 

" \rn                 显示相对行号
imap <leader>rn <ESC>:se relativenumber<CR>
nmap <leader>rn <ESC>:se relativenumber<CR>

" \nu                 显示正常行号
imap <leader>nu <ESC>:se nu!<CR>
nmap <leader>nu <ESC>:se nu!<CR>


" ======= 编译 && 运行 && 模板 ======= "

" 编译源文件
func! CompileCode()
    exec "w"
    if &filetype == "d"
        exec "!dmd -wi %:t"
    elseif &filetype == "php"
        exec "!php %:t"
    elseif &filetype == "sh"
        exec "!bash %:t"
    elseif &filetype == "scheme"
        exec "!petite --script %:t"
    endif
endfunc

" 运行可执行文件
func! RunCode()
    if &filetype == "d"
        if g:isWIN
            exec "!%:r.exe"
        else
            exec "!./%:r"
        endif
    elseif &filetype == "php"
        exec "!php %:t"
    elseif &filetype == "sh"
        exec "!bash %:t"
    elseif &filetype == "scheme"
        exec "!petite --script %:t"
    endif
endfunc

" \C         一键保存、编译
imap <leader>C <ESC>:call CompileCode()<CR>
nmap <leader>C :call CompileCode()<CR>

" \R         一键保存、运行
imap <leader>R <ESC>:call RunCode()<CR>
nmap <leader>R :call RunCode()<CR>

" \T         一键加载语法模板
imap <leader>T <ESC>:LoadTemplate<CR><ESC>:AuthorInfoDetect<CR><ESC>Gi
nmap <leader>T :LoadTemplate<CR><ESC>:AuthorInfoDetect<CR><ESC>Gi


" ======= VimWiki ======= "

let g:vimwiki_w32_dir_enc='utf-8' " 设置编码

let g:vimwiki_use_mouse=1         " 使用鼠标映射

" 声明可以在wiki里面使用的HTML标签
let g:vimwiki_valid_html_tags = 'a,img,b,i,s,u,sub,sup,br,hr,div,del,code,red,center,left,right,h1,h2,h3,h4,h5,h6,pre,script,style'

let blog = {}
if g:isWIN
    if g:atCompany
        let blog.path          = 'D:/Ruchee/Files/mysite/wiki/'
        let blog.path_html     = 'D:/Ruchee/Files/mysite/html/'
        let blog.template_path = 'D:/Ruchee/Files/mysite/templates/'
    else
        let blog.path          = 'D:/Ruchee/mysite/wiki/'
        let blog.path_html     = 'D:/Ruchee/mysite/html/'
        let blog.template_path = 'D:/Ruchee/mysite/templates/'
    endif
else
    let blog.path          = '~/mysite/wiki/'
    let blog.path_html     = '~/mysite/html/'
    let blog.template_path = '~/mysite/templates/'
endif
let blog.template_default  = 'site'
let blog.template_ext      = '.html'
let blog.auto_export       = 1

let g:vimwiki_list = [blog]

let g:winManagerWindowLayout='FileExplorer|TagList'
nmap wm :WMToggle<cr>

"set cscopequickfix=s-,c-,d-,i-,t-,e-
let g:SuperTabRetainCompletionType=2
let g:SuperTabDefaultCompletionType="<C-X><C-O>"

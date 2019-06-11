<?php

namespace App\Http\Controllers\Pc;
use App\AdminModel\Project;
use App\AdminModel\News;
use App\AdminModel\Pnew;
use Illuminate\Http\Request;
use App\Helpers\Common;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    /**普通文档
     * @param Request $request
     * @param $path
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetArticles($id)
    {
       
            $postarr = Project::where('status','1')->where('ID',$id)->first();
          
            if($postarr['ID']==''){

                // if($id < 128588){
                //     // $path = \Request::path();
                //     // if(strstr($path,'news/')){
                //     //    return  redirect('/'.$id.".html",301);
                //     // }
                //     return $this->GetNews2($id);
                // }
                   
                //    // return redirect('/news/'.$id.".html",301);
                
                // else
                     abort(404);
            }
           
             $termsfl = Common::getLanmufls($postarr->term_id);
             $ptermsfl = Common::getLanmufls($postarr->pterm_id);
            if($postarr->pterm_id!=0 && $postarr->term_id==0){
               
                $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a></li>';
                $arcTm = '<a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a>';
            }
            if($postarr->pterm_id!=0 && $postarr->term_id!=0){
                if($postarr->term_id == '3281'){
                      $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a></li>';
                      $arcTm = '<a href="/'.$ptermsfl->slug.'">'.$termsfl->name.'</a>';
                }else{
                    $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a></li><li><a href="/'.$ptermsfl->slug.'/'.$termsfl->slug.'">'.$termsfl->name.'</a></li>';
                    $arcTm = '<a href="/'.$ptermsfl->slug.'/'.$termsfl->slug.'">'.$termsfl->name.'</a>';
                }
                
                
               
            }
            if($id > 130263)
                $post_content = $postarr->post_content;
            else    
                $post_content = $this->wpautop($postarr->post_content,'true');

                  //获取文章中的图片
                $preg = "/<img.*?src=[\'\"](.+?)[\'\"].*?>/i"; 
                preg_match_all($preg, $post_content, $matchimg); 

              $desc =  str_limit($this->cutstr_html($post_content),410) ; 

             return view('pc.article_article',compact('postarr','prev_article','next_article','arcTm','id','arcdh','ptermsfl','post_content','termsfl','matchimg','desc'));
        

        
    }


    public function GetNews($id)
    {
       
         $path = \Request::path();
       
        // if(strstr($path,'news/')){
        //    return  redirect('/'.$id.".html",301);
        // }
        

        if(strstr($path,'news/')){
            $postarr =  cache()->remember('postarr_'.$id, 5, function() use($id){
                 return News::where('status','1')->where('ID',$id)->first();
            });
            if(empty($postarr->ID))
                abort(404);

             $termsfl = Common::getLanmufls($postarr->term_id);
             $ptermsfl = Common::getLanmufls($postarr->pterm_id);

            if($postarr->pterm_id!=0 && $postarr->term_id==0){
               
                $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->slug.'</a></li>';
                $arcTm = '<a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a>';
            }
            if($postarr->pterm_id!=0 && $postarr->term_id!=0){
                 if($ptermsfl->slug == 'zixun')
                            $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a></li>';
                else
                    $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a></li><li><a href="/'.$ptermsfl->slug.'/'.$termsfl->slug.'">'.$termsfl->name.'</a></li>';
                $arcTm = '<a href="/'.$ptermsfl->slug.'/'.$termsfl->slug.'">'.$termsfl->name.'</a>';
               
            }
            $xgydnews =  cache()->remember('xgydnews4s_', $this->times(), function() use($postarr){
                  return News::select('ID','post_title','post_content','images','post_date')->where('term_id',$postarr->term_id)->where('status',1)->orderBy('ID','desc')->take(4)->get();
                });
                 $post_content = $postarr->post_content;
            
               // $post_content = $this->wpautop($postarr->post_content,'true');

            $prev_article = $this->getPrevArticleId($postarr->ID,$postarr->pterm_id);
           // dd($prev_article);
            $next_article = $this->getNextArticleId($postarr->ID,$postarr->pterm_id);

             return view('pc.news_article',compact('postarr','prev_article','next_article','arcTm','id','arcdh','ptermsfl','post_content','xgydnews','termsfl'));
        }else
            abort(404);
    }


     public function GetPnews($id)
    {
         $path = \Request::path();

        if(strstr($path,'pnews/')){
            $postarr =  cache()->remember('pnewspostarr_'.$id, 5, function() use($id){
                 return Pnew::where('status','1')->where('id',$id)->first();
            });
            if(empty($postarr->id))
                abort(404);

             $termsfl = Common::getLanmufls($postarr->term_id);
             $ptermsfl = Common::getLanmufls($postarr->pterm_id);
             $pid = $postarr->pid;
            $postxmarr =  cache()->remember('pxm_'.$id, 10, function() use($pid){
                 return Project::where('status','1')->where('ID',$pid)->first();
            });

            if($postarr->pterm_id!=0 && $postarr->term_id==0){
                $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->slug.'</a></li>';
            }
            if($postarr->pterm_id!=0 && $postarr->term_id!=0){
                 
                $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a></li><li><a href="/'.$ptermsfl->slug.'/'.$termsfl->slug.'">'.$termsfl->name.'</a></li><li><a href="/'.$postxmarr->ID.'">'.$postxmarr->post_title.'</a></li>';

            }
            $xgydnews =  cache()->remember('pnewsxgydnews4_', $this->times(), function() use($pid){
                  return Pnew::select('id','post_title','post_content','images','post_date')->where('pid',$pid)->where('status',1)->orderBy('id','desc')->take(4)->get();
                });
                 $post_content = $postarr->post_content;
            
                //$post_content = $this->wpautop($postarr->post_content,'true');

            $prev_article = $this->getPrevpArticleId($postarr->id,$pid);
           // dd($prev_article);
            $next_article = $this->getNextpArticleId($postarr->id,$pid);

             return view('pc.pnews_article',compact('postarr','prev_article','next_article','id','arcdh','ptermsfl','post_content','xgydnews','termsfl','postxmarr'));
        }else
            abort(404);
    }

    function GetNews2($id)
    {
       
            $postarr =  cache()->remember('postarr_'.$id, 5, function() use($id){
                 return News::where('status','1')->where('ID',$id)->first();
            });
            if(empty($postarr->ID))
                abort(404);

             $termsfl = Common::getLanmufls($postarr->term_id);
             $ptermsfl = Common::getLanmufls($postarr->pterm_id);

            if($postarr->pterm_id!=0 && $postarr->term_id==0){
               
                $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->slug.'</a></li>';
                $arcTm = '<a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a>';
            }
            if($postarr->pterm_id!=0 && $postarr->term_id!=0){
                 if($ptermsfl->slug == 'zixun')
                            $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a></li>';
                else
                    $arcdh = '<li><a href="/'.$ptermsfl->slug.'">'.$ptermsfl->name.'</a></li><li><a href="/'.$ptermsfl->slug.'/'.$termsfl->slug.'">'.$termsfl->name.'</a></li>';
                $arcTm = '<a href="/'.$ptermsfl->slug.'/'.$termsfl->slug.'">'.$termsfl->name.'</a>';
               
            }
            $xgydnews =  cache()->remember('xgydnews4s_', $this->times(), function() use($postarr){
                  return News::select('ID','post_title','post_content','images','post_date')->where('term_id',$postarr->term_id)->where('status',1)->orderBy('ID','desc')->take(4)->get();
                });
                // $post_content = $postarr->post_content;
            
                $post_content = $this->wpautop($postarr->post_content,'true');

            $prev_article = $this->getPrevArticleId($postarr->ID,$postarr->pterm_id);
           // dd($prev_article);
            $next_article = $this->getNextArticleId($postarr->ID,$postarr->pterm_id);

            
             return view('pc.news_article',compact('postarr','prev_article','next_article','arcTm','id','arcdh','ptermsfl','post_content','xgydnews','termsfl'));
            
        
    }

    // protected function pgetPrevArticleId($id,$pterm_id)
    // {
    //      return  cache()->remember('getPrevArticleId_'.$id.'_'.$pterm_id, $this->times(), function () use ($id,$pterm_id) {
    //            return   Project::select('ID','post_title')->where('status','1')->where('pterm_id',$pterm_id)->where('ID', '<', $id)->first();
    //         });
    // }

    /**下一篇
     * @param $id
     * @return mixed
     */
    // protected function pgetNextArticleId($id,$pterm_id)
    // {
    //      return  cache()->remember('getNextArticleId_'.$id.'_'.$pterm_id, $this->times(), function () use ($id,$pterm_id) {
    //           return Project::select('ID','post_title')->where('status','1')->where('pterm_id',$pterm_id)->where('ID', '>', $id)->first();
    //         });

    // }

    protected function getPrevpArticleId($id,$pid)
    {
         return  cache()->remember('getPrevpArticleId_'.$id.'_'.$pid, $this->times(), function () use ($id,$pid) {
               return   Pnew::select('id','post_title')->where('status','1')->where('pid',$pid)->where('id', '<', $id)->first();
            });
    }

    /**下一篇
     * @param $id
     * @return mixed
     */
    protected function getNextpArticleId($id,$pid)
    {
         return  cache()->remember('getNextpArticleId_'.$id.'_'.$pid, $this->times(), function () use ($id,$pid) {
              return Pnew::select('id','post_title')->where('status','1')->where('pid',$pid)->where('id', '>', $id)->first();
            });

    }

    /**上一篇
     * @param $id
     * @return mixed
     */
    protected function getPrevArticleId($id,$pterm_id)
    {
         return  cache()->remember('getPrevArticleId_'.$id.'_'.$pterm_id, $this->times(), function () use ($id,$pterm_id) {
               return   News::select('ID','post_title')->where('status','1')->where('pterm_id',$pterm_id)->where('ID', '<', $id)->first();
            });
    }

    /**下一篇
     * @param $id
     * @return mixed
     */
    protected function getNextArticleId($id,$pterm_id)
    {
         return  cache()->remember('getNextArticleId_'.$id.'_'.$pterm_id, $this->times(), function () use ($id,$pterm_id) {
              return News::select('ID','post_title')->where('status','1')->where('pterm_id',$pterm_id)->where('ID', '>', $id)->first();
            });

    }
    protected function times()
    {
            return mt_rand(20,30);
        
    }

    protected function cutstr_html($string){  

        $string = strip_tags($string);  

        $string = trim($string);  

        $string = str_replace("\t","",$string);  

        $string = str_replace("\r\n","",$string);  

        $string = str_replace("\r","",$string);  

        $string = str_replace("\n","",$string);  

        $string = str_replace(" ","",$string); 
        $string = str_replace("&nbsp;","",$string); 
         $string = str_replace("补充：{无}","",$string); 

        return trim($string);  

    }
   protected function wpautop( $pee, $br = true ) {
        $pre_tags = array();

        if ( trim($pee) === '' )
            return '';

        // Just to make things a little easier, pad the end.
        $pee = $pee . "\n";

        /*
         * Pre tags shouldn't be touched by autop.
         * Replace pre tags with placeholders and bring them back after autop.
         */
        if ( strpos($pee, '<pre') !== false ) {
            $pee_parts = explode( '</pre>', $pee );
            $last_pee = array_pop($pee_parts);
            $pee = '';
            $i = 0;

            foreach ( $pee_parts as $pee_part ) {
                $start = strpos($pee_part, '<pre');

                // Malformed html?
                if ( $start === false ) {
                    $pee .= $pee_part;
                    continue;
                }

                $name = "<pre wp-pre-tag-$i></pre>";
                $pre_tags[$name] = substr( $pee_part, $start ) . '</pre>';

                $pee .= substr( $pee_part, 0, $start ) . $name;
                $i++;
            }

            $pee .= $last_pee;
        }
        // Change multiple <br>s into two line breaks, which will turn into paragraphs.
        $pee = preg_replace('|<br\s*/?>\s*<br\s*/?>|', "\n\n", $pee);

        $allblocks = '(?:table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary)';

        // Add a double line break above block-level opening tags.
        $pee = preg_replace('!(<' . $allblocks . '[\s/>])!', "\n\n$1", $pee);

        // Add a double line break below block-level closing tags.
        $pee = preg_replace('!(</' . $allblocks . '>)!', "$1\n\n", $pee);

        // Standardize newline characters to "\n".
        $pee = str_replace(array("\r\n", "\r"), "\n", $pee);

        // Find newlines in all elements and add placeholders.
        $pee = $this->wp_replace_in_html_tags( $pee, array( "\n" => " <!-- wpnl --> " ) );

        // Collapse line breaks before and after <option> elements so they don't get autop'd.
        if ( strpos( $pee, '<option' ) !== false ) {
            $pee = preg_replace( '|\s*<option|', '<option', $pee );
            $pee = preg_replace( '|</option>\s*|', '</option>', $pee );
        }

        /*
         * Collapse line breaks inside <object> elements, before <param> and <embed> elements
         * so they don't get autop'd.
         */
        if ( strpos( $pee, '</object>' ) !== false ) {
            $pee = preg_replace( '|(<object[^>]*>)\s*|', '$1', $pee );
            $pee = preg_replace( '|\s*</object>|', '</object>', $pee );
            $pee = preg_replace( '%\s*(</?(?:param|embed)[^>]*>)\s*%', '$1', $pee );
        }

        /*
         * Collapse line breaks inside <audio> and <video> elements,
         * before and after <source> and <track> elements.
         */
        if ( strpos( $pee, '<source' ) !== false || strpos( $pee, '<track' ) !== false ) {
            $pee = preg_replace( '%([<\[](?:audio|video)[^>\]]*[>\]])\s*%', '$1', $pee );
            $pee = preg_replace( '%\s*([<\[]/(?:audio|video)[>\]])%', '$1', $pee );
            $pee = preg_replace( '%\s*(<(?:source|track)[^>]*>)\s*%', '$1', $pee );
        }

        // Collapse line breaks before and after <figcaption> elements.
        if ( strpos( $pee, '<figcaption' ) !== false ) {
            $pee = preg_replace( '|\s*(<figcaption[^>]*>)|', '$1', $pee );
            $pee = preg_replace( '|</figcaption>\s*|', '</figcaption>', $pee );
        }

        // Remove more than two contiguous line breaks.
        $pee = preg_replace("/\n\n+/", "\n\n", $pee);

        // Split up the contents into an array of strings, separated by double line breaks.
        $pees = preg_split('/\n\s*\n/', $pee, -1, PREG_SPLIT_NO_EMPTY);

        // Reset $pee prior to rebuilding.
        $pee = '';

        // Rebuild the content as a string, wrapping every bit with a <p>.
        foreach ( $pees as $tinkle ) {
            $pee .= '<p>' . trim($tinkle, "\n") . "</p>\n";
        }

        // Under certain strange conditions it could create a P of entirely whitespace.
        $pee = preg_replace('|<p>\s*</p>|', '', $pee);

        // Add a closing <p> inside <div>, <address>, or <form> tag if missing.
        $pee = preg_replace('!<p>([^<]+)</(div|address|form)>!', "<p>$1</p></$2>", $pee);

        // If an opening or closing block element tag is wrapped in a <p>, unwrap it.
        $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);

        // In some cases <li> may get wrapped in <p>, fix them.
        $pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee);

        // If a <blockquote> is wrapped with a <p>, move it inside the <blockquote>.
        $pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
        $pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);

        // If an opening or closing block element tag is preceded by an opening <p> tag, remove it.
        $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)!', "$1", $pee);

        // If an opening or closing block element tag is followed by a closing <p> tag, remove it.
        $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);

        // Optionally insert line breaks.
        // if ( $br ) {
        //     // Replace newlines that shouldn't be touched with a placeholder.
        //     $pee = preg_replace_callback('/<(script|style).*?<\/\\1>/s', '_autop_newline_preservation_helper', $pee);

        //     // Normalize <br>
        //     $pee = str_replace( array( '<br>', '<br/>' ), '<br />', $pee );

        //     // Replace any new line characters that aren't preceded by a <br /> with a <br />.
        //     $pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee);

        //     // Replace newline placeholders with newlines.
        //     $pee = str_replace('<WPPreserveNewline />', "\n", $pee);
        // }

        // If a <br /> tag is after an opening or closing block tag, remove it.
        $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*<br />!', "$1", $pee);

        // If a <br /> tag is before a subset of opening or closing block tags, remove it.
        $pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)[^>]*>)!', '$1', $pee);
        $pee = preg_replace( "|\n</p>$|", '</p>', $pee );

        // Replace placeholder <pre> tags with their original content.
        if ( !empty($pre_tags) )
            $pee = str_replace(array_keys($pre_tags), array_values($pre_tags), $pee);

        // Restore newlines in all elements.
        if ( false !== strpos( $pee, '<!-- wpnl -->' ) ) {
            $pee = str_replace( array( ' <!-- wpnl --> ', '<!-- wpnl -->' ), "\n", $pee );
        }

        return $pee;
    }

    function get_html_split_regex() {
        static $regex;

        if ( ! isset( $regex ) ) {
            $comments =
                  '!'           // Start of comment, after the <.
                . '(?:'         // Unroll the loop: Consume everything until --> is found.
                .     '-(?!->)' // Dash not followed by end of comment.
                .     '[^\-]*+' // Consume non-dashes.
                . ')*+'         // Loop possessively.
                . '(?:-->)?';   // End of comment. If not found, match all input.

            $cdata =
                  '!\[CDATA\['  // Start of comment, after the <.
                . '[^\]]*+'     // Consume non-].
                . '(?:'         // Unroll the loop: Consume everything until ]]> is found.
                .     '](?!]>)' // One ] not followed by end of comment.
                .     '[^\]]*+' // Consume non-].
                . ')*+'         // Loop possessively.
                . '(?:]]>)?';   // End of comment. If not found, match all input.

            $escaped =
                  '(?='           // Is the element escaped?
                .    '!--'
                . '|'
                .    '!\[CDATA\['
                . ')'
                . '(?(?=!-)'      // If yes, which type?
                .     $comments
                . '|'
                .     $cdata
                . ')';

            $regex =
                  '/('              // Capture the entire match.
                .     '<'           // Find start of element.
                .     '(?'          // Conditional expression follows.
                .         $escaped  // Find end of escaped element.
                .     '|'           // ... else ...
                .         '[^>]*>?' // Find end of normal element.
                .     ')'
                . ')/';
        }

        return $regex;
    }
    function wp_replace_in_html_tags( $haystack, $replace_pairs ) {
        // Find all elements.
        $textarr = $this->wp_html_split( $haystack );
        $changed = false;

        // Optimize when searching for one item.
        if ( 1 === count( $replace_pairs ) ) {
            // Extract $needle and $replace.
            foreach ( $replace_pairs as $needle => $replace );

            // Loop through delimiters (elements) only.
            for ( $i = 1, $c = count( $textarr ); $i < $c; $i += 2 ) {
                if ( false !== strpos( $textarr[$i], $needle ) ) {
                    $textarr[$i] = str_replace( $needle, $replace, $textarr[$i] );
                    $changed = true;
                }
            }
        } else {
            // Extract all $needles.
            $needles = array_keys( $replace_pairs );

            // Loop through delimiters (elements) only.
            for ( $i = 1, $c = count( $textarr ); $i < $c; $i += 2 ) {
                foreach ( $needles as $needle ) {
                    if ( false !== strpos( $textarr[$i], $needle ) ) {
                        $textarr[$i] = strtr( $textarr[$i], $replace_pairs );
                        $changed = true;
                        // After one strtr() break out of the foreach loop and look at next element.
                        break;
                    }
                }
            }
        }

        if ( $changed ) {
            $haystack = implode( $textarr );
        }

        return $haystack;
    }

    function wp_html_split( $input ) {
        return preg_split( $this->get_html_split_regex(), $input, -1, PREG_SPLIT_DELIM_CAPTURE );
    }

    
    function _get_wptexturize_split_regex( $shortcode_regex = '' ) {
        static $html_regex;

        if ( ! isset( $html_regex ) ) {
            $comment_regex =
                  '!'           // Start of comment, after the <.
                . '(?:'         // Unroll the loop: Consume everything until --> is found.
                .     '-(?!->)' // Dash not followed by end of comment.
                .     '[^\-]*+' // Consume non-dashes.
                . ')*+'         // Loop possessively.
                . '(?:-->)?';   // End of comment. If not found, match all input.

            $html_regex =            // Needs replaced with wp_html_split() per Shortcode API Roadmap.
                  '<'                // Find start of element.
                . '(?(?=!--)'        // Is this a comment?
                .     $comment_regex // Find end of comment.
                . '|'
                .     '[^>]*>?'      // Find end of element. If not found, match all input.
                . ')';
        }

        if ( empty( $shortcode_regex ) ) {
            $regex = '/(' . $html_regex . ')/';
        } else {
            $regex = '/(' . $html_regex . '|' . $shortcode_regex . ')/';
        }

        return $regex;
    }

}

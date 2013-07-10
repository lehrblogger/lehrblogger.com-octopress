# from https://gist.github.com/joelverhagen/1805814
class IframeEmbed < Liquid::Tag
  Syntax = /^\s*(vimeo|youtube|google|slideshare)\s+([^\s]+)(\s+(\d+)x(\d+))?(\s+\?([^\s]+))?\s*$/
 
  def initialize(tagName, markup, tokens)
    super
    if markup =~ Syntax then
      @type = $1
      @id = $2
      if $3.nil? then
        @width = 700
        @height = 421
      else
        @width = $4.to_i
        @height = $5.to_i
      end
      if $7.nil? then
        @params = ''
      else
        @params = '&' + $7
      end
    else
      raise "Improper argument format in the \"iframe_embed\" tag!"
    end
  end
 
  def render(context)
    dimensions = "width=\"#{@width}\" height=\"#{@height}\""
    styles = "style=\"width: #{@width}px; height: #{@height}px;\""
    if @type == "youtube"
      # "<iframe width=\"#{@width}\" height=\"#{@height}\" src=\"http://www.youtube.com/embed/#{@id}?color=white&theme=light&rel=0&vq=hd720\" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>"
      "<iframe src=\"http://www.youtube.com/embed/#{@id}?color=white&theme=light&rel=0&vq=hd720#{@params}\" #{dimensions} #{styles} frameborder=\"0\"></iframe>"
    elsif @type == "vimeo"
      "<iframe src=\"http://player.vimeo.com/video/#{@id}\"                                                 #{dimensions} #{styles} frameborder=\"0\"></iframe>"
    elsif @type == "google"                                                                                                        
      "<iframe src=\"http://docs.google.com/present/embed?id=#{@id}&size=m\"                                #{dimensions} #{styles} frameborder=\"0\"></iframe>"
    elsif @type == "slideshare"                                                                                                    
      "<iframe src=\"http://www.slideshare.net/slideshow/embed_code/#{@id}\"                                #{dimensions} #{styles} frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" style=\"border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px\"></iframe>"
    end
  end
 
  Liquid::Template.register_tag "iframe_embed", self
end

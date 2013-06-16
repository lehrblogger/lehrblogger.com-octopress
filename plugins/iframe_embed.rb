# from https://gist.github.com/joelverhagen/1805814
class IframeEmbed < Liquid::Tag
  Syntax = /^\s*(vimeo|youtube|google|slideshare)\s*([^\s]+)(\s+(\d+)\s+(\d+)\s*)?/
 
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
    else
      raise "No content ID provided in the \"iframe_embed\" tag"
    end
  end
 
  def render(context)
    if @type == "youtube"
      # "<iframe width=\"#{@width}\" height=\"#{@height}\" src=\"http://www.youtube.com/embed/#{@id}\" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>"
      "<iframe src=\"http://www.youtube.com/embed/#{@id}?color=white&theme=light\" width=\"#{@width}\" height=\"#{@height}\" frameborder=\"0\"></iframe>"
    elsif @type == "vimeo"
      "<iframe src=\"http://player.vimeo.com/video/#{@id}\"                        width=\"#{@width}\" height=\"#{@height}\" frameborder=\"0\"></iframe>"
    elsif @type == "google"
      "<iframe src=\"http://docs.google.com/present/embed?id=#{@id}&size=m\"       width=\"#{@width}\" height=\"#{@height}\" frameborder=\"0\"></iframe>"
    elsif @type == "slideshare"
      "<iframe src=\"http://www.slideshare.net/slideshow/embed_code/#{@id}\"       width=\"#{@width}\" height=\"#{@height}\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" style=\"border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px\"></iframe>"
    end
  end
 
  Liquid::Template.register_tag "iframe_embed", self
end

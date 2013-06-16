# Modelled after stravid's category_aware_next_generator.rb 
# https://gist.github.com/stravid/4078840
# http://stravid.com/en/category-aware-previous-and-next-for-jekyll-posts/

module Jekyll
  class LayoutAwareNextGenerator < Generator
    require 'set'
    
    safe true
    priority :high
    
    def generate(site)
      layouts = Set.new site.posts.collect{|item| item.data["layout"]}
      layouts.each do |layout_name|
        items = site.posts.select{|item| item.data["layout"] == layout_name }
        items.each do |item|
          position = items.index item
          
          if position && position > 0
            layout_previous = items[position - 1]
          else
            layout_previous = nil
          end
          
          if position && position < items.length - 1
            layout_next = items[position + 1]
          else
            layout_next = nil
          end
          
          item.data["layout_previous"] = layout_previous unless layout_previous.nil?
          item.data["layout_next"] = layout_next unless layout_next.nil?
        end
      end
    end
  end
end

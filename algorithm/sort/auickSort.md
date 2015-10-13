#PHP-quick-sort

<h2>Introduction</h2>
<p>When it comes to sorting items by comparing them <a href="http://www.stoimen.com/blog/2012/03/05/computer-algorithms-merge-sort/" title="Computer Algorithms: Merge Sort">merge sort</a> is one very natural approach. It is natural, because simply divides the list into two equal sub-lists then sort these two partitions applying the same rule. That is a typical divide and conquer algorithm and it just follows the intuitive approach of speeding up the sorting process by reducing the number of comparisons. However there are other “divide and conquer” sorting algorithms that do not follow the merge sort scheme, while they have practically the same success. Such an algorithm is quicksort.</p>
<h2>Overview</h2>
<p>Back in 1960 <a href="http://en.wikipedia.org/wiki/Tony_Hoare" title="C. A. R. Hoare" target="_blank">C. A. R. Hoare</a> comes with a brilliant sorting algorithm. In general quicksort consists of some very simple steps. First we’ve to choose an element from the list (called a pivot) then we must put all the elements with value less than the pivot on the left side of the pivot and all the items with value greater than the pivot on its right side. After that we must repeat these steps for the left and the right sub-lists. That is quicksort! Simple and elegant! </p>
<p></p><figure id="attachment_2908" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Quicksort.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Quicksort.png" alt="Quicksort" title="Quicksort" class="size-full wp-image-2908" height="399" width="620"></a><figcaption class="wp-caption-text"> </figcaption></figure><span id="more-2899"></span><p></p>
<p>It is a pure divide and conquer approach as merge sort, but while merge sort’s tricky part was merging the sorted sub-lists, in quicksort there are other things to consider. </p>
<p>First of all obviously the choice of a pivot is the bottleneck. Indeed it all depends on that pivot. Imagine that you choose the greatest value from the list – than you’ve to put all the other items of the list into the “left” sub-list. If you do that on each step you’ll practically go into the worst scenario and that is no good. The thing is that in the worst case quicksort is not so effective and it’s practically as slow as bubble sort and insertion sort. The good thing is that in practice with randomly generated lists there is not a high possibility to go into the worst case of quicksort.</p>
<h3>Choosing a pivot</h3>
<p>Of course the best pivot is the middle element from the list. Thus the list will be divided into two fairly equal sub-lists. The problem is that there’s not an easy way to get the middle element from a list and this will slow down the algorithm. So typically we can get for a pivot the first or the last item of the list.</p>
<p>After choosing a pivot the rest is simple. Put every item with a greater value on the right and every item with a lesser value on the left. Then we must sort the left and right sub-lists just as we did with the initial list. </p>
<p><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/MerginginQuicksort.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/MerginginQuicksort.png" alt="Merging in Quicksort" title="Merging in Quicksort" class="alignnone size-full wp-image-2910" height="399" width="620"></a></p>
<p>It’s clear that with this algorithm naturally we’re going into a recursive solution. Typically every divide and conquer approach is easy to implement with recursion. But because recursion can be heavy, there is an iterative approach.</p>

<h2>Complexity</h2>
<p>The complexity of quicksort in the average case is O(n*log(n)) – same as Merge sort. The problem is that in the worst case it is O(n<sup>2</sup>) – same as bubble sort. Obviously the worst case is when we have an already sorted list, and we constantly take for a pivot the last element of the list. But we should consider that in practice we don’t quite use sorted lists that we have to sort again, right?</p>
<p><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Quicksort.Average.Worst_.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Quicksort.Average.Worst_.png" alt="Quicksort average and worst case scenarios" title="Quicksort.Average.Worst" class="alignnone size-full wp-image-2909" height="371" width="600"></a></p>
<h2>Application</h2>
<p>Quicksort is a great sorting algorithm and developers often go for it, but let’s see some pros and cons of it.</p>
<h3>Why using quicksort</h3>
<ol>
<li>Recursive implementation is easy</li>
<li>In general its speed is same as merge sort – O(n*log(n))</li>
<li>Elegant solution with no tricky merging as merge sort</li>
</ol>
<h3>Why not using quicksort</h3>
<ol>
<li>As slow as bubble sort in the worst case!</li>
<li>Iterative implementation isn’t easy</li>
<li>There are faster algorithms for some sets of data types</li>
</ol>
<p>Quicksort is beautiful because of the elegant idea behind its principles. Indeed if you have two sorted lists one with items with a greater value from a given value and the other with items smaller form that given value you can simply concatenate them and you can be sure that the resulting list will be sorted with no need of special merge. </p>
<p>In fact quicksort is a very elegant general purpose sorting algorithm and every developer should be familiar with its principles

source : http://www.stoimen.com/blog/2012/03/13/computer-algorithms-quicksort/

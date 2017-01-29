
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
 $http.get("http://192.168.1.25:8888/medecins").then(function (response) {
      $scope.myData = response.data;
  });
});


var app2 = angular.module('myApp2', []);
app2.controller('customersCtrl2', function Ctrl($scope,$http) {
    
    
     $http.get("http://192.168.1.25:8888/medecins").then(function (response) {
      $scope.myData = response.data;
  });
    
   

});




var myModule = angular.module('hello', []);
    myModule.controller('pagingCtrl', function ($scope, $http) {
        $scope.data = [{id:1,name:"a"},{id:2,name:"b"},{id:3,name:"a"},{id:4,name:"b"},{id:5,name:"a"},{id:6,name:"b"},{id:7,name:"a"},{id:8,name:"b"}];
        $scope.currentPage = 1;
        $scope.numPages = 5;
        $scope.pageSize = 10;
        $scope.pages = [];
        //get first page
        /*$http.get('url',
                {
                    method: 'GET',
                    params: {
                        'pageNo': $scope.currentPage,
                        'pageSize': $scope.pageSize
                    },
                    responseType: "json"
                }).then(function (result) {
                    $scope.data = result.data.Data;
                    $scope.numPages = Math.ceil(result.data.Total / result.data.PageSize);
                });*/
        $scope.onSelectPage = function (page) {
            //replace your real data
            /*$http.get('url',
                {
                    method: 'GET',
                    params: {
                        'pageNo': page,
                        'pageSize': $scope.pageSize
                    },
                    responseType: "json"
                }).then(function (result) {
                    $scope.data = result.data.Data;
                    $scope.numPages = Math.ceil(result.data.Total / result.data.PageSize);
                });*/
        };
    });

    myModule.directive('paging', function() {
        return {
            restrict: 'E',
            //scope: {
            //    numPages: '=',
            //    currentPage: '=',
            //    onSelectPage: '&'
            //},
            template: '',
            replace: true,
            link: function(scope, element, attrs) {
                scope.$watch('numPages', function(value) {
                    scope.pages = [];
                    for (var i = 1; i <= value; i++) {
                        scope.pages.push(i);
                    }
                    alert(scope.currentPage )
                    if (scope.currentPage > value) {
                        scope.selectPage(value);
                    }
                });
                scope.isActive = function(page) {
                    return scope.currentPage === page;
                };
                scope.selectPage = function(page) {
                    if (!scope.isActive(page)) {
                        scope.currentPage = page;
                        scope.onSelectPage(page);
                    }
                };
                scope.selectPrevious = function() {
                    if (!scope.noPrevious()) {
                        scope.selectPage(scope.currentPage - 1);
                    }
                };
                scope.selectNext = function() {
                    if (!scope.noNext()) {
                        scope.selectPage(scope.currentPage + 1);
                    }
                };
                scope.noPrevious = function() {
                    return scope.currentPage == 1;
                };
                scope.noNext = function() {
                    return scope.currentPage == scope.numPages;
                };

            }
        };
    });




var app=angular.module('paginationModule', []);  

app.controller('PaginationController', function($scope) {

 console.log('PaginationController')  ; 

        $scope.predicate = 'name';  
       $scope.reverse = true;  
       $scope.currentPage = 1;  
       $scope.order = function (predicate) {  
         $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;  
         $scope.predicate = predicate;  
       };  
       $scope.students = [  
           
         { name: 'AMine', age: 25, gender: 'boy' },  
         { name: 'John', age: 30, gender: 'girl' },  
         { name: 'Laura', age: 28, gender: 'girl' },  
         { name: 'Joy', age: 15, gender: 'girl' },  
         { name: 'Marys', age: 58, gender: 'girl' },  
         { name: 'Peter', age: 95, gender: 'boy' },  
         { name: 'Bob', age: 50, gender: 'boy' },  
         { name: 'Erika', age: 27, gender: 'girl' },  
         { name: 'Patrick', age: 40, gender: 'boy' },  
         { name: 'Tery', age: 60, gender: 'girl' }  ,
         { name: 'Kevin', age: 25, gender: 'boy' },  
         { name: 'John', age: 30, gender: 'girl' },  
         { name: 'Laura', age: 28, gender: 'girl' },  
         { name: 'Joy', age: 15, gender: 'girl' },  
         { name: 'Mary', age: 28, gender: 'girl' },  
         { name: 'Peddsdter', age: 95, gender: 'boy' },  
         { name: 'Bob', age: 50, gender: 'boy' },  
         { name: 'Erirka', age: 27, gender: 'girl' },  
         { name: 'Patrrick', age: 40, gender: 'boy' },  
         { name: 'Tezry', age: 60, gender: 'girl' }  , 
         { name: 'Keevin', age: 25, gender: 'boy' },  
         { name: 'Joehn', age: 30, gender: 'girl' },  
         { name: 'Laeura', age: 28, gender: 'girl' },  
         { name: 'Joey', age: 15, gender: 'girl' },  
         { name: 'Madsry', age: 28, gender: 'girl' },  
         { name: 'Pedster', age: 95, gender: 'boy' },  
         { name: 'Bodb', age: 50, gender: 'boy' },  
         { name: 'Erisdka', age: 27, gender: 'girl' },  
         { name: 'Patr4ick', age: 40, gender: 'boy' },  
         { name: 'Tery2', age: 60, gender: 'girl' }  
       ];  
       $scope.totalItems = $scope.students.length;  
       $scope.numPerPage = 5;  
       $scope.paginate = function (value) {  
         var begin, end, index;  
         begin = ($scope.currentPage - 1) * $scope.numPerPage;  
         end = begin + $scope.numPerPage;  
         index = $scope.students.indexOf(value);  
         return (begin <= index && index < end);  
       };  
       

});

app.factory('dataFactory', function() {
	var factory = {};
	factory.data = [];

	//Fill with fake data
	function init() {
	    for (var i=0; i<1000; i++) {
	        factory.data.push("AngularJs "+i);
	    }
	}

	init();

	return factory;
});


 var app = angular.module('app', [])
       .controller('appController', appController);

   appController.$inject = ['$scope', '$window'];

   function appController($scope, $window) {

       $scope.title = "date sorting example";

       $scope.sortType = "name";
       $scope.sortReverse = true;

       var dateA = new Date();
       dateA.setDate(dateA.getDate() + 2);
       var dateB = new Date();
       dateB.setDate(dateB.getDate() + 4);
       var dateC = new Date();
       dateC.setDate(dateC.getDate() + 7);
       var dateD = new Date();
       dateD.setDate(dateD.getDate() + 20);

       $scope.allItems = [{
           date: dateA,
           name: "A" 
       }, {
           date: dateB,
           name: "B"
       }, {
           date: dateC,
           name: "C"
       }, {
           date: dateD,
           name: "D"
       }];

   };

 
 
 
 
 
 
 
 angular.module('sortApp', [])

.controller('mainController', function($scope) {
  $scope.sortType     = 'name'; // set the default sort type
  $scope.sortReverse  = false;  // set the default sort order
  $scope.searchFish   = '';     // set the default search/filter term
  
  // create the list of sushi rolls 
  $scope.sushi = [
    { name: 'Cali Roll', fish: 'Crab', tastiness: 2 },
    { name: 'Philly', fish: 'Tuna', tastiness: 4 },
    { name: 'Tiger', fish: 'Eel', tastiness: 7 },
    { name: 'Rainbow', fish: 'Variety', tastiness: 6 } , 
    { name: 'Cali Roll 2', fish: 'Crab', tastiness: 2 },
    { name: 'Philly 2', fish: 'Tuna', tastiness: 4 },
    { name: 'Tiger 2', fish: 'Eel', tastiness: 7 },
    { name: 'Rainbow 2', fish: 'Variety', tastiness: 6 }
  ];
  
});
 
 
 
 
 
 
 
 
 
 //Demo of Searching Sorting and Pagination of Table with AngularJS - Advance Example

var myApp = angular.module('myApp999', []);
 

//Not Necessary to Create Service, Same can be done in COntroller also as method like add() method
myApp.service('filteredListService', function () {
     
    
    this.searched = function (valLists,toSearch) {
        return _.filter(valLists, 
        function (i) {
            /* Search Text in all 3 fields */
            return searchUtil(i, toSearch);
        });        
    };
    
    this.paged = function (valLists,pageSize)
    {
        retVal = [];
        for (var i = 0; i < valLists.length; i++) {
            if (i % pageSize === 0) {
                retVal[Math.floor(i / pageSize)] = [valLists[i]];
            } else {
                retVal[Math.floor(i / pageSize)].push(valLists[i]);
            }
        }
        return retVal;
    };
 
});

var TableCtrl = myApp.controller('TableCtrl', function ($scope, $filter, filteredListService) {
 
    $scope.pageSize = 4;
    $scope.allItems = getDummyData(); 
    $scope.reverse = false;
 
    $scope.resetAll = function () {
        $scope.filteredList = $scope.allItems;
        $scope.newEmpId = '';
        $scope.newName = '';
        $scope.newEmail = '';
        $scope.searchText = '';
        $scope.currentPage = 0;
        $scope.Header = ['','',''];
    }


    $scope.add = function () {
        $scope.allItems.push({
            EmpId: $scope.newEmpId,
            name: $scope.newName,
            Email: $scope.newEmail
        });
        $scope.resetAll();
    }

    $scope.search = function () {
        $scope.filteredList = 
       filteredListService.searched($scope.allItems, $scope.searchText);
        
        if ($scope.searchText == '') {
            $scope.filteredList = $scope.allItems;
        }
        $scope.pagination(); 
    }


    // Calculate Total Number of Pages based on Search Result
    $scope.pagination = function () {
        $scope.ItemsByPage = filteredListService.paged( $scope.filteredList, $scope.pageSize );         
    };

    $scope.setPage = function () {
        $scope.currentPage = this.n;
    };

    $scope.firstPage = function () {
        $scope.currentPage = 0;
    };

    $scope.lastPage = function () {
        $scope.currentPage = $scope.ItemsByPage.length - 1;
    };

    $scope.range = function (input, total) {
        var ret = [];
        if (!total) {
            total = input;
            input = 0;
        }
        for (var i = input; i < total; i++) {
            if (i != 0 && i != total - 1) {
                ret.push(i);
            }
        }
        return ret;
    };
    
    $scope.sort = function(sortBy){
        $scope.resetAll();  
        
        $scope.columnToOrder = sortBy; 
             
        //$Filter - Standard Service
        $scope.filteredList = $filter('orderBy')($scope.filteredList, $scope.columnToOrder, $scope.reverse); 

        if($scope.reverse)
             iconName = 'glyphicon glyphicon-chevron-up';
         else
             iconName = 'glyphicon glyphicon-chevron-down';
              
        if(sortBy === 'EmpId')
        {
            $scope.Header[0] = iconName;
        }
        else if(sortBy === 'name')
        {
            $scope.Header[1] = iconName;
        }else {
            $scope.Header[2] = iconName;
        }
         
        $scope.reverse = !$scope.reverse;   
        
        $scope.pagination();    
    };
    
    //By Default sort ny Name
     $scope.sort ('name');  
    
});

 

//Inject Services for DI
//$scope is standard service provided by framework
//If we want to use standard $Filter, It also needs to be injected
//filteredService - custom created by me
TableCtrl.$inject = ['$scope', '$filter','filteredListService'];

function searchUtil(item, toSearch) {
    /* Search Text in all 3 fields */
    return (item.name.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.Email.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.EmpId == toSearch) ? true : false;
}

/*Get Dummy Data for Example*/
function getDummyData() {
    return [
        {
        EmpId: 22,
        name: 'Jitendra',
        Email: 'jz@gmail.com'
    }, {
        EmpId: 102,
        name: 'Minal',
        Email: 'amz@gmail.com'
    }, {
        EmpId: 34,
        name: 'Rudra',
        Email: 'ruz@gmail.com'
    }, {
        EmpId: 211,
        name: 'Jitendra1',
        Email: 'jz@gmail.com'
    }, {
        EmpId: 121,
        name: 'Minal1',
        Email: 'amz@gmail.com'
    }, {
        EmpId: 315,
        name: 'Rudra1',
        Email: 'ruz@gmail.com'
    }, {
        EmpId: 242,
        name: 'Jitendra2',
        Email: 'jz@gmail.com'
    }, {
        EmpId: 182,
        name: 'Minal2',
        Email: 'amz@gmail.com'
    }, {
        EmpId: 329,
        name: 'Rudra2',
        Email: 'ruz@gmail.com'
    }, {
        EmpId: 263,
        name: 'Jitendra3',
        Email: 'jz@gmail.com'
    }, {
        EmpId: 137,
        name: 'Minal3',
        Email: 'amz@gmail.com'
    }, {
        EmpId: 373,
        name: 'Rudra3',
        Email: 'ruz@gmail.com'
    },{
        EmpId: 202,
        name: 'Jitendra',
        Email: 'jz@gmail.com'
    }, {
        EmpId: 155,
        name: 'Minal',
        Email: 'amz@gmail.com'
    }, {
        EmpId: 314,
        name: 'Rudra',
        Email: 'ruz@gmail.com'
    }, {
        EmpId: 2851,
        name: 'Jitendra1',
        Email: 'jz@gmail.com'
    }, {
        EmpId: 1741,
        name: 'Minal1',
        Email: 'amz@gmail.com'
    }, {
        EmpId: 317,
        name: 'Rudra1',
        Email: 'ruz@gmail.com'
    }, {
        EmpId: 242,
        name: 'Jitendra2',
        Email: 'jz@gmail.com'
    }, {
        EmpId: 12,
        name: 'Minal2',
        Email: 'amz@gmail.com'
    }, {
        EmpId: 32,
        name: 'Rudra2',
        Email: 'ruz@gmail.com'
    }, {
        EmpId: 23,
        name: 'Jitendra3',
        Email: 'jz@gmail.com'
    }, {
        EmpId: 13,
        name: 'Minal3',
        Email: 'amz@gmail.com'
    }, {
        EmpId: 33,
        name: 'Rudra3',
        Email: 'ruz@gmail.com'
    }];
}
 
 

  angular.element(document).ready(function() {
  angular.bootstrap(document.getElementById("myApp999"),['myApp999']);
});
 
 
 
 angular.element(document).ready(function() {
  angular.bootstrap(document.getElementById("mainControllerSorter"),['sortApp']);
});
 

angular.element(document).ready(function() {
  angular.bootstrap(document.getElementById("s3_container1981"),['app']);
});


angular.element(document).ready(function() {
  angular.bootstrap(document.getElementById("s3_container9"),['paginationModule']);
});



angular.element(document).ready(function() {
  angular.bootstrap(document.getElementById("s3_container99"),['hello']);
});


angular.element(document).ready(function() {
  angular.bootstrap(document.getElementById("s3_container2"),['myApp2']);
});


     
angular.element(document).ready(function() {
  angular.bootstrap(document.getElementById("s3_sorter"),['MyForm']);
});



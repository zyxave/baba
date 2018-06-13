#include <cstdio>
#include <string>
#include <cstring>
#include <iostream>
#include <stack>

using namespace std;

stack<char>myStack;

int main(){

	string mathExpression;
	int testcase;
    

    scanf("%d", &testcase);
    getchar();

    for (int i=0; i<testcase; i++){

    	getline(cin, mathExpression);

    	bool cekOperator = false;
    	bool ans = true;
    	myStack.empty();

    	for (int j=0; j<(mathExpression.size()); j++)
	    {
	        char temp2 = mathExpression[j];


	        //operator
	        if (temp2 == '+' || temp2 == '-' || temp2 == '*' || temp2 == '/' || temp2 == '^')
	        {
	            if (cekOperator == false)
	                cekOperator = true;
	            else
	                ans = false;        //error
	        }

	        //bracket

	        else if (temp2 == '(' || temp2 == '[' || temp2 == '{')
	        {
	            if (cekOperator == true || i == 0)
	                myStack.push(temp2);
	             else
	                ans = false;        //error
	        }

	        else if ((temp2 == ')' || temp2 == ']' || temp2 == '}') && (myStack.size() > 0))
	        {
	            if (myStack.top() == '(' && temp2 == ')')
	            {
	                myStack.pop();
	            }

	            else if (myStack.top() == '[' && temp2 == ']')
	            {
	                myStack.pop();
	            }

	            else if (myStack.top() == '{' && temp2 == '}')
	            {
	                myStack.pop();
	            }

	            else
	            {
	                ans = false;            //error
	            }

	            cekOperator = false;        
	        }

	        else if (temp2 != ' ')
	        {
	        	if (cekOperator==false && j>0){
	        		ans = false;
	        	}
	            cekOperator = false;        
	        }


	        
	    }

	    if (ans == false || myStack.size() > 0)
	        printf("Case #%d: Salah\n", i+1);
	    else
	        printf("Case #%d: Benar\n", i+1);
	}
}

    

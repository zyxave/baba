#include<iostream>
#include<string>
#include<algorithm>
#include<string.h>
#include<math.h>


using namespace std;
 
long long bc(int n, int k){
    int C[k+1];
    memset(C, 0, sizeof(C));
    C[0] = 1;
    for (int i = 1; i <= n; i++){
        for (int j = min(i, k); j > 0; j--)
            C[j] = C[j] + C[j-1];
    }
    return C[k];
}

int main(){
	int a;
	cin>>a;
	while(a--){
		long long n,m;
	    cin>>m>>n;
	    for(int i=n;i>=0;i--){
	    	int x= bc(n,i);
	    	long long ans=(long long)(x);
	    	long long y=pow(m,n-i);
	    	long long jawab=ans*y;
	    	if(i==0){
	    		if(jawab!=0){
	    			cout<<jawab<<endl;
	    		}
	    	}
	    	else if(i==1){
	    		if(jawab!=0){
	    			if(jawab==1){
	    				cout<<"x"<<" ";
	    			}
	    			else cout<<jawab<<"x"<<" ";
	    		}
	    	}
	    	else{
	    		if(jawab!=0){
	    			if(jawab!=1){
	    				cout<<jawab<<"x"<<i<<" ";
	    			}
	    			else cout<<"x"<<i<<" ";
	    		}
	    	}
	    }
	}	
}
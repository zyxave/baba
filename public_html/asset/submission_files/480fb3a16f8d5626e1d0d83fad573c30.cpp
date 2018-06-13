#include <bits/stdc++.h>
using namespace std;
unsigned long long res;


unsigned long long int fact (unsigned long long int a,unsigned long long int b)
{
	if (a==b-1)
	{
		return 1;
	}
	else
	{
		return a*fact(a-1,b);
	}
}

unsigned long long int comb (unsigned long long int x, unsigned long long int y)
{
	return fact(x,max(y,x-y)+1)/(fact(min(y,x-y),1));
}



unsigned long long int pang(int a,int b){
    int ans=1;
    if (b == 0) return 1;
    else {
        for (int i=1; i<=b; i++){
            ans = ans * a;
        }
        return ans;
    }
}

void ans (unsigned long long x,unsigned long long y,unsigned long long a,unsigned long long b)
{
	if (b==y)
	{
		res = comb(y,a)*pang(x,b);
		cout<<res<<endl;
	}
	else
	{
		res = comb(x,b)*pang(y,a);
		if (res!=1)
		{
			cout<<res;
		}
		cout<<"x";
		if (x!=1)
		{
			cout<<x;
		}
		cout<<" ";
		ans (x,y,a-1,b+1); 
	}
}

int main()
{
	int t;
	cin>>t;
	for (int tcase=0; tcase<t; tcase++)
	{
		unsigned long long x,y;
		cin>>p>>q;
		unsigned long long a=y;
		unsigned long long b=0;
		ans (x,y,a,b);
	}
	return 0;
}

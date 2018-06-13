#include <bits/stdc++.h>
using namespace std;
unsigned long long res;

unsigned long long fact (unsigned long long x,unsigned long long y)
{
	if (x==y-1)
	{
		return 1;
	}
	else
	{
		return x*fact(x-1,y);
	}
}

unsigned long long comb (unsigned long long p, unsigned long long q)
{
	return fact(p,max(q,p-q)+1)/(fact(min(q,p-q),1));
}

void ans (unsigned long long p,unsigned long long q,unsigned long long x,unsigned long long y)
{
	if (y==q)
	{
		res = comb(q,y)*pow(p,y);
		cout<<res<<endl;
	}
	else
	{
		res = comb(q,y)*pow(p,y);
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
		ans (p,q,x-1,y+1); 
	}
}

int main()
{
	int t;
	cin>>t;
	for (int tcase=0; tcase<t; tcase++)
	{
		unsigned long long p,q;
		cin>>p>>q;
		unsigned long long x=q;
		unsigned long long y=0;
		ans (p,q,x,y);
	}
	return 0;
}

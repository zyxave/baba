#include <bits/stdc++.h>
using namespace std;
void ans (int p,int q,int x,int y);
long int comb (int p, int q);
long int fact(int x);
long int res;

long int fact (int x)
{
	if (x==0)
	{
		return 1;
	}
	else
	{
		return x*fact(x-1);
	}
}

long int comb (int p, int q)
{
	return fact(p)/(fact(q)*fact(p-q));
}

void ans (int p,int q,int x, int y)
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
		int p,q;
		cin>>p>>q;
		int x=q;
		int y=0;
		ans (p,q,x,y);
	}
	return 0;
}

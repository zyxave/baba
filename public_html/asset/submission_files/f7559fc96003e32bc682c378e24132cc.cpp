#include<bits/stdc++.h>
using namespace std;
int aa;
int pw(int n)
{	aa=1;
	for(int i=0;i<n;i++)
	{
		aa=aa*2;
	}
}
int rek(int n)
{
	if(n==1)
	{
		return n; 
	}
	else  if(n%2==0)
	{
		n=n/2;
		rek(n);
	}
	else return 1;
}

int main()
{
	int n,jlh;
	cin>>n;
	for(int i=0;i<n;i++)
	{jlh=0;
		int a1,a2;
		cin>>a1;
		pw(a1);
		for(int j=1;j<=aa;j++)
		{
			jlh=jlh+(j/rek(j));
			
		}
		cout<<jlh;
	}
}

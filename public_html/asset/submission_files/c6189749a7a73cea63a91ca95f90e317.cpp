#include<bits/stdc++.h>
using namespace std;
int pangkat(int d,int e)//d pangkat e(pkon)
{
	int i;
	int f=1;
	if (e==0)
	{
		f=0;
	}
	if (e==1)
	{
		f=d;
	}
	else if (e>=2)
	{
		f=1;
		for(i=1;i<=e;i++)
		{
			f=f*d;
		}
	}
	return f;
}
int tes(int l)
{
	cout<<"Tes "<<l<<endl;
}
int main()
{
	int t,p,q;
	int i,j,k;
	int kon=0;
	char hasil[10][3];
	cin>>t;
	for(i=1;i<=t;i++)
	{
		cin>>p;
		cin>>q;
		kon=0;
		int temanq=q;
		for(j=1;j<=q+1;j++)
		{
			int a;
			int b;
			//fungsi kombi
			int c;//asu
			int pas;
			if (q-temanq==0)
			{
				int a;
				pas=1;
			}
			else if (q-temanq==1)
			{
				pas=q;
			}
			else if (temanq==1)
			{
				pas=q;
			}
			else if (temanq==0)
			{
				pas=1;
			}
			else
			{
				a=q;
				b=temanq;
		 		for(i=1;i<=q-temanq;i++)
				{
					a=a*(a-1);
				}
				for(i=1;i<=temanq-1;i++)
				{
					b=b*1;
				}
				//fungsi kombi
				pas=a/b;
			}
			//cout<<p<<endl;
			//cout<<kon<<endl;
			//cout<<pas<<endl;
			//cout<<pangkat(p,kon)<<endl;
			//cout<<q+1-j<<endl;
			if (pas*pangkat(p,kon)==0 || pas*pangkat(p,kon)==1)
			{
				cout<<""<<"x"<<q+1-j<<" ";
			}
			else if (q+1-j==1)
			{
				cout<<pas*pangkat(p,kon)<<"x"<<""<<" ";
			}
			else if (q+1-j==0)
			{
				cout<<pas*pangkat(p,kon)<<" ";
			}
			else if (pas*pangkat(p,kon)==0 && q+1-j==0)
			{
				cout<<"x";
			}
			else 
			{
				cout<<pas*pangkat(p,kon)<<"x"<<q+1-j<<" ";
			}
			kon++;
			temanq--;
		}
	}
}

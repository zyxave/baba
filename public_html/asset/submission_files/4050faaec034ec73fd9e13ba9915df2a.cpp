#include<bits/stdc++.h>
using namespace std;
int t,res,ans,leng,a,b,c,anss,xx=0,yy=0,z,arr[100005];
bool ses,boo,bo;
char s[100004];
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%s",&s);anss=1;bo=false;
		leng=strlen(s)	;
		if(leng>1)
		{
			res=2;
		}
		else if(leng==1) res=1;
		for(a=2;a<leng;a++)
		{
			ses=false;
			if(bo)
			{
				boo=false;
				for(b=a+1;b<z+a+1;b++)
				{
					if(s[b]==arr[b-a-1]) ;
					else 
					{
						boo=true;
						break;
					}
				}
				if(boo==false)
				{
					res++;ses=true;
					a+=(anss-1);
				}
			}
			if(ses==false){
			anss=1;
			for(b=0;b<a;b++)
			{
				if(s[a]==s[b])
				{
					ans=1;z=0;
					for(c=b+1;c<a;c++)
					{
					//	printf("%d %d %d %d\n",a,b,c,res);
					//	printf("%c %c\n",s[c],s[a+c-b]);
						if(s[c]!=s[a+c-b])
						{
							break;
						}
						arr[z++]=s[c];
						ans++;
					}
					anss=max(anss,ans);
				}
			}
			if(anss>2) res+=2,a+=anss-1,bo=true;
			else res++;}
		}
		printf("%d\n",res);
	}
}
